<?php

namespace App\Http\Controllers;

use App\Models\auth_logs;
use App\Models\logs;
use App\Models\projects;
use App\Models\staff;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function showDashboard()
    {
        $project['pro'] = projects::orderBy('id', 'DESC')->limit(5)->get();
        $projectCount = projects::all();
        $userCount = staff::all();
        $logCount = logs::all();
        $authlogs = auth_logs::all();
        return view('dashboard')->with($project)->with(compact('projectCount','userCount'))->with(compact('logCount','authlogs'));

    }


    public function showDashboardStaff()
    {
        $project['pro'] = projects::orderBy('id', 'DESC')->limit(5)->get();
        $projectCount = projects::all();

        return view('staff.dashboard')->with($project)->with(compact('projectCount'));
    }



}
