<?php

namespace App\Filament\App\Pages;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Filament\Pages\Auth\Register as BaseRegister;

// this class contains business logic for creating a new user account via "Sign up" feature
class RegisterNewUser extends BaseRegister
{
    protected function handleRegistration(array $data): Model
    {
        // filament will register a new user account as usual
        /** @var User $user */
        $user = parent::handleRegistration($data);

        // do below after filament creating a new user account:
        // 1. create a new team. Team name will be user's name + ' Team'. e.g. user name is "Peter Pan", team name will be "Peter Pan Team"
        // 2. attach user to the newly created team, set user as team admin. Team admin will be able to invite users by sending email invitation

        // create a new team
        $team = Team::create([
            'name' => $user->name . ' Team',
        ]);

        // attach the new user as team admin to the new team
        $team->admins()->attach($user, ['is_admin' => 1]);
 
        return $user;
    }
}