<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
//
//    protected $primaryKey = 'user_id';

//    const CREATED_AT = 'user_create_date';
    
    
    protected $table = 'wp_users';
    protected $primaryKey = 'ID';


    public $timestamps = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
//        'name', 'email', 'password', 'is_admin'
        'user_login',
        'user_pass',
        'user_nicename',
        'user_email',
        'display_name',
        'user_registered',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $attributes = [
        // 'is_admin' => false,
        // 'user_reference' => null,
            // 'company_showroom' => null,
            // '' => null,
            // '' => null,
            // '' => null,
            // '' => null,
            // '' => null,
            // '' => null,
            // '' => null,
            // '' => null,
            // '' => null,
            // '' => null,
            // '' => null,
    ];

    public function getAuthPassword() {
        return $this->user_pass;
    }
    public function setAuthPassword() {
        return $this->user_pass;
    }

    public function getEmailForPasswordReset()
    {
        return $this->user_email;
    }
    public function ememberUser() {
        return $this->hasOne(EmemberUser::class, 'email', 'user_email');
    }

    public function routeNotificationFor($driver)
{
    if (method_exists($this, $method = 'routeNotificationFor'.Str::studly($driver))) {
        return $this->{$method}();
    }

    switch ($driver) {
        case 'database':
            return $this->notifications();
        case 'mail':
            return $this->user_email;
        case 'nexmo':
            return $this->phone_number;
    }
}

}
