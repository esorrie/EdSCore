# EdScore About
Football data from past and current seasons that uses an API to gather real time data, allowing you to compare the statistics from any area of a teams performance. Each team has their own statistics that you can compare to each other respectively. 
While players and managers have personal details due to API limitations.
An api has been used as it allows for the data of the current season to be updated automatically for teams, players and managers. 


## Requirements
- Git
- Docker
- NPM
- vite v4.4.4
- Composer
- Laravel v10.15.0
- PHP v

## Installation
Download Repo. Install composer. Run `composer install`.

## Run the project
 - docker-compose up -d

 - To build the front end
    - npm run dev 

## How to use 
### Non-users only have access to the home page
 - Create a new user account with email, password & name
 - If you don't have an account register

### League Menu
 - The league index displays each of the leagues that are called using the API
 - the search bar allows you to filter the league results to find a desired league more easily
 - Clicking on one will take you to the league view page
#### League View Page
 - The overview section of the view page will display the next fixture in the league 
 - the standings section will display the league table 
 - the fixtures section displays matches that are yet to be played in the season
 - the results section displays matches that have been played in the season and the match scores 
 - the team list will display all teams in the league with their name, stadium and the year they were founded

### Team Menu
 - The team index will display all teams that are called by the API 
 - The search bar allows you to filter the team results to find a desired team more easily
 - Clicking on one will take you to the team view page
#### Team View Page
 - The overview section of the view page will display the next fixture for this particular team along with general team details, and a 5 row preview of the teams league
 - the fixtures section displays the teams matches that are yet to be played in the season 
 - the results section displays the teams matches that have been played in the season and the match scores 
 - the player list will display all player in the team with their name, position and the nationality. This is also organized by position 

### Player Menu 
- The player index will display all players that are called from the API
- The search bar allows you to filter the player results to find a desired player more easily
- Clicking on one will take you to the player view page
#### Player View Page
 - The player view page shows information about the selected player including: player details and upcoming fixture

### Manager Menu
- The manager index will display all managers that are called from the API
- The search bar allows you to filter the manager results to find a desired manager more easily
- Clicking on one will take you to the manager view page
#### Manager View Page
 - The manager view page shows information about the selected manager including: manager details and upcoming fixture












