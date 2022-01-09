<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class signUp extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['staff_id', 'name', 'contacts', 'password',];

    protected $table = 'users';


    protected static $logAttributes = ['staff_id', 'name', 'contacts', 'password',];


    public function getDescriptionForEvent(string $eventName): string
    {
        return  "User {$eventName}";
    }

    protected static $logName = 'User';

    protected static $logOnlyDirty = true;
}
