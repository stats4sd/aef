<?php

namespace App\Filament\App\Pages;

use Closure;
use App\Models\Team;
use App\Models\User;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Register as BaseRegister;

// this class contains business logic for creating a new user account via "Sign up" feature
class RegisterNewUser extends BaseRegister
{
    // customise registration form to add course code field
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),

            // add course code field
            // add verification, user must enter a valid course code before submitting the registration form
            // this is to only allow people who took the course to register an user account.
            // in other words, this is to block public people to register to avoid unexpected data and traffic
            TextInput::make('course_code')
                ->required()
                ->maxLength(20)
                // hardcode course code temporary as a quick solution
                //
                // further enhancement: 
                // 1. create a database table to store all course codes, add CRUD panel in admin panel
                // 2. allow user to register if any existing course code is entered
                ->rules([
                    fn(): Closure => function (string $attribute, $value, Closure $fail) {
                        if ($value != '314159') {
                            $fail('The :attribute is invalid.');
                        }
                    },
                ]),

            $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        // filament will register a new user account as usual
        /** @var User $user */
        $user = parent::handleRegistration($data);

        // do below after filament creating a new user account:
        // 1. create a new team. Team name will be user's name + ' Team'. e.g. user name is "Peter Pan", team name will be "Peter Pan Team"
        // 2. attach user to the newly created team, set user as team admin

        // create a new team
        $team = Team::create([
            'name' => $user->name . ' Team',
        ]);

        // attach the new user as team admin to the new team
        $team->admins()->attach($user, ['is_admin' => 1]);
 
        return $user;
    }
}