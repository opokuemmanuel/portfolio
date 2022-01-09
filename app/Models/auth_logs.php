<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auth_logs extends Model
{
    use HasFactory;

    protected $fillable = ['id','authenticatable_type','authenticatable_id','ip_address','user_agent','login_at','logout_at'];

    protected $table = 'authentication_log';
}
