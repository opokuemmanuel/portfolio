<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function portfolio ()
    {
        $projects['pro'] = projects::orderBy('id', 'DESC')->simplePaginate(6);
       return view('portfolio.portfolio')->with($projects);
    }
}
