<?php

namespace App\Console\Commands;

use App\Models\League;
use App\Models\Team;
use App\Models\Fixture;
use App\Models\Manager;
use App\Models\Player;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;

class IngestCompetitions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ingest-competitions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // dd(Team::find(1)->league->toArray());
        // dd(League::find(1)->teams->toArray());
        // GET COMPETITIONS
        

        // dd($dataLeagues);
        $responseLeagues = Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get('https://api.football-data.org/v4/competitions');
        $dataLeagues = $responseLeagues->json();
        $leagues = $dataLeagues['competitions'];

        foreach($leagues as $league) {
            // Check if the league code is not 'PL' (Premier League) and skip the rest of the loop
            if($league['code'] != 'PL') {
                continue; // This will stop us for now calling tonnes of requests for each league
            }
            // Create a slug for the league name
            $slug = Str::slug($league['name'], '-');
            
            // Update or create a new League record with the data from the API
            League::updateOrCreate( ['id' => $league['id']],[
                'id' => $league['id'],
                'name' => $league['name'],
                'emblem' => $league['emblem'],
                'location' => $league['area']['name'],
                'slug' => $slug,
            ]);

            // Get teams for the current league from getTeams
            $leagueTeams = $this->getTeams($league['code'])->json('teams');
            
            // Loop through each team and update or create a new Team record
            foreach($leagueTeams as $team){
                //First create the team
                // Create a slug for the team name (for URL purposes)
                $slug = Str::slug($team['name'], '-');

                $newTeam = Team::updateOrCreate( ['id' => $team['id']],[
                    'id' => $team['id'],
                    'slug' => $slug,
                    'name' => $team['shortName'],
                    'crest' => $team['crest'],
                    'stadium' => $team['venue'],
                    'founded' => $team['founded'],
                    'location' => $team['area']['name'],
                    'manager' => $team['coach']['name'], // get manager name from an manager api call not team
                ]);
                
                // Next link team to leagues
                foreach($team['runningCompetitions'] as $competition) {
                    $teamLeague = League::find($competition['id']);
    
                    if($teamLeague) {
                        // Sync the relationship between team and league without detaching any other teams
                        $teamLeague->teams()->syncWithoutDetaching($newTeam);
                    }
                }
            }

            // Get standings for the current league from getStandings
            $leagueStandings = $this->getStandings($league['code'])->json('standings');
            foreach ($leagueStandings as $leagueStanding ){

                // Loop through each team's standings and update the corresponding Team record
                foreach($leagueStanding['table'] as $tableItem) {
                    $team = Team::find($tableItem['team']['id']);

                    if($team) {
                        // Sync the league data for the team without detaching other leagues
                        $team->league()->syncWithoutDetaching([$competition['id'] =>
                            [
                                'won' => $tableItem['won'], 
                                'drawn' => $tableItem['draw'], 
                                'lost' => $tableItem['lost'],
                                'gf' => $tableItem['goalsFor'], 
                                'ga' => $tableItem['goalsAgainst'], 
                                'gd' => $tableItem['goalDifference'], 
                            ]
                        ]);
                    }      
                }
            } 
            
            $leagueMatches = $this->getMatches($league['code'])->json('matches');
            foreach ($leagueMatches as $leagueMatch) {
                $slugHome = Str::slug($leagueMatch['homeTeam']['name'], '-');
                $slugAway = Str::slug($leagueMatch['awayTeam']['name'], '-');
                $formattedDate = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $leagueMatch['utcDate'])->setTimezone('utc')->format('d/m/y H:i');

                $referee = null;

                foreach($leagueMatch['referees'] as $referee) {
                    $referee = $referee['name'];
                }

                Fixture::updateOrCreate([ 'id' => $leagueMatch['id'] ],[
                    'league_id' => $leagueMatch['competition']['id'],
                    'date' => $formattedDate,
                    'home_team_id' => $leagueMatch['homeTeam']['id'],
                    'away_team_id' => $leagueMatch['awayTeam']['id'],
                    'home_team_slug' => $slugHome,
                    'away_team_slug' => $slugAway,
                    'home_team' => $leagueMatch['homeTeam']['shortName'],
                    'away_team' => $leagueMatch['awayTeam']['shortName'],
                    'home_team_crest' => $leagueMatch['homeTeam']['crest'],
                    'away_team_crest' => $leagueMatch['awayTeam']['crest'],
                    'half_time_home' => $leagueMatch['score']['halfTime']['home'],
                    'half_time_away' => $leagueMatch['score']['halfTime']['away'],
                    'full_time_home' => $leagueMatch['score']['fullTime']['home'],
                    'full_time_away' => $leagueMatch['score']['fullTime']['away'],
                    'referee' => $referee
                    
                ]);
                
            }

            // Loop through each manager and update or create a new Team record
            foreach($leagueTeams as $manager){

                //First create the manager
                // Create a slug for the manager name (for URL purposes)
                $slug = Str::slug($manager['coach']['name'], '-');
                
                Manager::updateOrCreate(['id' => $manager['coach']['id']] ,[
                    'team_id' => $manager['id'], 
                    'id' => $manager['coach']['id'],
                    'slug' => $slug,
                    'name' => $manager['coach']['name'],
                    'date_of_birth' => $manager['coach']['dateOfBirth'],
                    'country' => $manager['coach']['nationality'],
                    'contract_start' => $manager['coach']['contract']['start'],
                    'contract_end' => $manager['coach']['contract']['until'],
                ]);
            }

            // Loop through each team
            foreach($leagueTeams as $leagueTeam){

                foreach($leagueTeam['squad'] as $player) {
                    //First create the player
                    // Create a slug for the player name (for URL purposes)
                    $slug = Str::slug($player['name'], '-');
                    
                    Player::updateOrCreate(['id' => $player['id']] ,[
                        'team_id' => $leagueTeam['id'], 
                        'id' => $player['id'],
                        'slug' => $slug,
                        'name' => $player['name'],
                        'position' => $player['position'],        
                        'date_of_birth' => $player['dateOfBirth'],
                        'country' => $player['nationality'],
                    ]);
                }
            }
        }

    }

    private function getTeams($leagueCode) {
        return Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get(sprintf('https://api.football-data.org/v4/competitions/%s/teams', $leagueCode));
    } 

    private function getStandings($leagueCode) {
        return Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get(sprintf('https://api.football-data.org/v4/competitions/%s/standings', $leagueCode));
    } 

    private function getMatches($leagueCode) {
        return Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get(sprintf('https://api.football-data.org/v4/competitions/%s/matches', $leagueCode));
    } 

    // private function getPlayerInfo($leagueCode) {
    //     return Http::withHeader('X-Auth-Token', 'b7173c63c2084739b77c6fe4cb8bf7f0')->get(sprintf('https://api.football-data.org/v4/persons/%s/matches', $leagueCode));
    // } 
}
