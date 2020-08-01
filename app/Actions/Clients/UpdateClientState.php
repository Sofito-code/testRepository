<?php

namespace App\Actions\Clients;

use App\User;

class UpdateClientState
{
    public static function execute(User $user): string
    {
        if ($user->enabled == true) {
            $user->enabled = false;
            $user->save();
            return 'client.disable';
        } else {
            $user->enabled = true;
            $user->save();
            return 'client.index';
        }
    }
}
