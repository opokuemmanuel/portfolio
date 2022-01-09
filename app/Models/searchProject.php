<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class searchProject extends Model
{
    use HasFactory;

    protected $fillable = ['project_title','staff_ID','project_link','project_color','project_logo'];

    protected $table = 'projects';

    protected $primaryKey = 'project_title';
}
