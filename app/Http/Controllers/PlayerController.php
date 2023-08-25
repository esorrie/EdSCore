<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;


class PlayerController extends Controller
{
    
    // The index function retrieves a paginated list of players and returns the 'players.index' view.
    public function index(): View 
    {
        $search = request()->query('name');

        if ($search) {
            $player = Player::where('name', 'LIKE', "%{$search}%")->orderBy('name')->simplePaginate('20');

        } else {
            $player = Player::orderBy('name')->simplePaginate('20');
        }

        return view('players.index', [
            'players' => $player,
        ]);
    }

    // The view function displays the details of a specific player identified by the provided ID and slug.
    public function view(int $id, string $slug): RedirectResponse|View
    {
        // Find the player with the given ID in the database.
        $player = Player::where('id', $id)->first();
        $team = Team::where('id', $id)->first();

        if(! $player) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        // Check if the provided slug matches the actual slug of the player.
        // If not, redirect to the correct URL for the player using the correct slug.
        if($player->slug !== $slug) {
            return redirect()->route('players.view', [
                'id' => $player->id,
                'slug' => $player->slug,
            ]);
        }
        // Create an array representation of the player object.
        $playerArray = $player->toArray();
        // Define the keys for the table data that will be displayed on the player's view page.
        $tableDataKeys = ['country', 'date_of_birth', 'position', 'number'];

        // Prepare table data for the player's general information.
        foreach($tableDataKeys as $key) {
            $playerTableData[] = [
                Str::replace('_', ' ',[ // Convert underscores to spaces in the key for display.
                    'data' => $key,
                    'style' => 'uppercase'
                ]),
                [
                    'data' => data_get($playerArray, $key),
                    'style' => 'text-right uppercase'
                ]
            ];
        }

        // Define the keys for the table data that will display the player's statistics .
        $statTableDataKeys = ['appearances', 'goals', 'assists'];

        foreach($statTableDataKeys as $key) {
            $statTableData[] = [
                [
                    'data' => $key,
                    'style' => 'uppercase'
                ],
                [
                    'data' => data_get($playerArray, $key),
                    'style' => 'text-right uppercase'
                ]
            ];
        }
    
        // Return the 'players.view' view with the player details and the prepared table data.
        return view('players.view', [
            'team' => $team,
            'player' => $player,
            'playerTableData' => $playerTableData,
            'statTableData' => $statTableData,
        ]);
    }

}