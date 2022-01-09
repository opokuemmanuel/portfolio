<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;
use Yadahan\AuthenticationLog\AuthenticationLogable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Searchable, LogsActivity;
    use Notifiable, AuthenticationLogable;



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    public function searchableAs()
    {
        return 'name';
    }

    protected $fillable = ['staff_id', 'name', 'contacts', 'password',];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */

    protected static $logAttributes =['staff_id', 'name', 'contacts', 'password',];


    public function getDescriptionForEvent(string $eventName): string
    {
        return  "User logged In";
    }

    protected static $logName = 'User';

    protected static $logOnlyDirty = true;


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
