<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Broadcast;

=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

<<<<<<< HEAD
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
=======
Broadcast::channel('App.User.{id}', function ($user, $id) {
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    return (int) $user->id === (int) $id;
});
