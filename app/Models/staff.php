<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class staff extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['staff_id','name','contact','role','account_status'];

    protected $table = 'staff';

    protected static $logAttributes = ['staff_id','name','contact','role','account_status'];

    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return  "staff {$eventName}";
    }

    protected static $logName = 'Staff';

    protected static $logOnlyDirty = true;



}
