<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;

class RegisterResponse implements RegistrationResponse
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // redirect user to admin panel (for admin user) or app panel (for non admin user) after user registration

        $home = auth()->user()->is_admin ? '/admin' : '/app';

        return redirect()->intended($home);
    }
}
