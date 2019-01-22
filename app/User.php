<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserPasswordCreating;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'password', 'company', 'activity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'role', 'remember_token'
    ];

    /**
     * Events
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'creating' => UserPasswordCreating::class, // Hash user's password
    ];

    /**
     * One To Many relationship
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'owner_id');
    }
}
