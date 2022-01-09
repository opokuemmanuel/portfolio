<?php

namespace App\Models;

use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;

class projects extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['project_title','staff_ID','project_link','project_color','project_logo'];

    protected $table = 'projects';

    protected $primaryKey = 'id';

    protected static $logAttributes = ['project_title','staff_ID','project_link','project_color','project_logo'];




    public function getDescriptionForEvent(string $eventName): string
    {
        return  "project {$eventName}";
    }

    protected static $logName = 'Project';

    protected static $logOnlyDirty = true;




}
