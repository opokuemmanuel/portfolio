<?php

namespace App\Http\Controllers;

use App\Models\auth_logs;
use App\Models\logs;
use App\Models\User;
use Illuminate\Http\Request;

class logsController extends Controller
{
    public function logs()
    {
      $logs['log'] =logs::orderBy('id', 'DESC')->simplePaginate(6);
      return view('logs')->with($logs);

    }

    public function auth_logs()
    {
        $auth['logs'] = auth_logs::orderBy('id', 'DESC')->simplePaginate(10);
        return view('authenticable')->with($auth);
    }

    public function view_user($id = null)
    {
            $auth_user = User::where('id',$id)->first();
            return view('auth_user',compact('auth_user'));
    }
}
