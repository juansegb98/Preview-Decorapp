<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use MikeMcLin\WpPassword\Facades\WpPassword;

class MyEloquentUserProvider extends EloquentUserProvider {

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials) {
        $plain = $credentials['password'];
        $hashed_value = $user->getAuthPassword();
        
        $hashed_password = WpPassword::make($plain);
        //return $hashed_value == md5($plain);
        
        return WpPassword::check($plain, $hashed_value);
    }

}
