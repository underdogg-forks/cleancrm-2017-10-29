<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
 */

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('splate:version', function () {
    $this->comment(config('splate.version'));
})->describe('Display an inspiring quote');

Artisan::command('splate:database', function () {
    // ask database name, default is splate
    $connection = $this->ask('What is your connection type?', 'mysql');
    $host = $this->ask('What is your database host?', '127.0.0.1');
    $port = $this->ask('What is your database port?', 3306);
    $database = $this->ask('What is your database name?', 'splate');
    $username = $this->ask('What is your database user?', 'root');
    $password = $this->secret('What is your database user\'s password?', 'password');

    $default_connection = $this->laravel['config']['database.default'];
    $connection_details = $this->laravel['config']['database.connections.' . $default_connection];

    file_put_contents($this->laravel->environmentFilePath(), str_replace(
        [
            'DB_CONNECTION=' . $default_connection,
            'DB_HOST=' . $connection_details['host'],
            'DB_PORT=' . $connection_details['port'],
            'DB_DATABASE=' . $connection_details['database'],
            'DB_USERNAME=' . $connection_details['username'],
            'DB_PASSWORD=' . $connection_details['password'],
        ],
        [
            'DB_CONNECTION=' . $connection,
            'DB_HOST=' . $host,
            'DB_PORT=' . $port,
            'DB_DATABASE=' . $database,
            'DB_USERNAME=' . $username,
            'DB_PASSWORD=' . $password,
        ],
        file_get_contents($this->laravel->environmentFilePath())
    ));

    $create_database = $this->ask('Do you want Splate to create the database for you', 'yes');

    if ($create_database == 'yes') {
        DB::connection($default_connection)->statement('CREATE DATABASE IF NOT EXISTS ' . $database);
    }

    $this->call('clear:cache'); // clear up cache
})->describe('Configure database connection');
