## Board Game Tracker 2.0


An enhanced version of my original boardgame tracker. This new version includes the following features

* new theme using Semantic-UI
* Improved game adding and searching using the official Boardgamegeek API
* Improved user profiles including new styling, profile photos, and bios
* Authentication and roles system for users
* Tags and labels for games, players, and gameplays
* Improved gameplay feature for tracking amount of time played, start, stop and pausing mid-session

## Installation

1. Clone repository
2. Run `composer install`
3. Change ownership of `storage` directory or give full read/write permissions
4. Run `php artisan migrate`
5. Profit

## Todos

* Finish playthroughs
* Setup default account, and roles
* Further authentication on routes
* Style Games and players lists


