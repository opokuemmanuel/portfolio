<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    use HasFactory;

    protected $fillable = ['log_name','description','subject','causer','properties'];

    protected $table = 'activity_log';


}
