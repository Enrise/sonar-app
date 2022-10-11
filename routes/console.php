<?php

use App\Models\User;
use App\Notifications\FailIt;
use App\Notifications\ShipIt;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Notification;

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
})->purpose('Display an inspiring quote');
Artisan::command('fail', function () {
    $this->output->writeln("Something went wrong!");
    return Command::FAILURE;
})->purpose('Just fail');

Artisan::command('user', function () {
   User::factory()->create();
    $this->comment('Done!');
})->purpose('Shipping time!');

Artisan::command('shipit', function () {
    $user = User::first();

    $user->notify(new ShipIt());

    $this->comment('Done!');
})->purpose('Shipping time!');

Artisan::command('failit', function () {
    $user = User::first();

    $user->notify(new FailIt());

    $this->comment('Done!');
})->purpose('Whoops!');
