
# Laravel React
![Static Badge](https://img.shields.io/badge/laravel-lang-red)
![Static Badge](https://img.shields.io/badge/PHP-lang-red)
![Static Badge](https://img.shields.io/badge/React-lang-green?labelColor=red)
![Static Badge](https://img.shields.io/badge/TypeScript-lang-green?labelColor=red)
![Static Badge](https://img.shields.io/badge/Cypress-testing-green?labelColor=red)
![Static Badge](https://img.shields.io/badge/PHP%20Unit-testing-green)


This is a sample project showing use of React with Laravel. 
check demo:(dashboard access is request only feature for now)
website: https://demo.zmenia.com/
dashboard: https://demo.zmenia.com/dashboard

## Setup
- Git clone project
- composer update
- npm install
- php artisan storage:link
- Grant proper permissions for storage folder
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache



Used Languages are
- Laravel 10.X
- React 18.X
- TypeScript
- Php 8.1
- Blade
- CSS
- Bootstrap
- Inertia
- Axios
- JavaScript

## Currently developing
- PHP Unit Tests for backend
- Cypress (End to End) - to test React front
## Up comming Features
- Integrating Strip payment system
- Mailing system
- PHP Unit testing
- Frontend testing
- Changing interface for smooth experience
- Adding permissions for each users to cover all the actions in dashboard.

## Testing
Backend Testing
php artisan test --testsuite=Feature

front (end to end test)
npx cypress open