# EdScore About
Football data from past and current seasons that uses an API to gather real time data, allowing you to compare the statistics from any area of a teams performance. Each team has their own statistics that you can compare to each other respectively. 
While players and managers have personal details due to API limitations.
An api has been used as it allows for the data of the current season to be updated automatically for teams, players and managers. 


## Requirements
- Git
- Docker: to containerize the application
- NPM
- NODE.JS: to run vite for front-end development
- Composer: to manage laravel dependencies
- Laravel v10.15.0
- PHP v

## Installation
 - Copy the github repository. 
### Build and run docker containers
 - open the terminal and navigate to the project directory
    - `docker-compose up -d`
### Install Composer Dependencies
 - open the terminal and navigate to the project directory
    - `composer install`
### Install Node.js dependencies 
 - open the terminal and navigate to the project directory
    - `npm install`
### Running Vite for Front-End
 - `npm run dev`



## How to use 
### Non-users only have access to the home page
 - Create a new user account with email, password & name
 - If you don't have an account register

### Home Page 
 - Displays the next fixture across all league fixtures
 
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












