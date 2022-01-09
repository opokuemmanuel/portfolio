<?php

namespace App\Http\Controllers;

use App\Models\auth_logs;
use App\Models\logs;
use App\Models\projects;
use App\Models\searchProject;
use App\Models\staff;
use App\Models\UpdateStaff;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Validator;

use Symfony\Component\Console\Input\Input;

class ProjectsController extends Controller
{
    public function ShowAddProduct()
    {
      return view('addProduct');
    }

    public function ShowAddProductStaff()
    {
        return view('staff.addProduct');
    }



    public function allProjects()
    {
        $project['pro'] = DB::table('projects')->orderBy('id', 'DESC')->simplePaginate(6);
         return view('allProjects')->with($project);
    }

    public function allProjectsStaff()
    {
        $project['pro'] = DB::table('projects')->orderBy('id', 'DESC')->simplePaginate(6);
        return view('staff.allProjects')->with($project);
    }



    public function editProject($id=null)
    {
        $project = projects::where('id',$id)->first();
        return view('editProject')->with(compact('project'));
    }

    public function editProjectStaff($id=null)
    {
        $project = projects::where('id',$id)->first();
        return view('staff.editProject')->with(compact('project'));
    }



    public function delete($id=null)
    {
        projects::find($id)->delete();

        $project['pro'] = projects::orderBy('id', 'DESC')->simplePaginate(6);
        return view('allProjects')->with($project)->with('successMsg','Project deleted successfully');

    }

    public function deleteStaff($id=null)
    {
        projects::find($id)->delete();

        $project['pro'] = projects::orderBy('id', 'DESC')->simplePaginate(6);
        return view('staff.allProjects')->with($project)->with('successMsg','Project deleted successfully');

    }

    public function addProject(Request $request)
    {

        $validator_data = $request->validate([
            'title' => ['required'],
            'link' =>  ['required'],
            'logo' =>  ['required']
        ],[
            'title.required'=>'project title required',
            'link.required'=>'project link required',
            'logo.required'=>'project logo required'
        ]);

//           $validator->validate();

        if ($validator_data){
            $image  = $request->file('logo');

            $filename    = $image->getClientOriginalName();


            Image::make($image)->save(public_path('/post/'.$filename));

            $input = [];
            $input['project_title'] = $request->title;
            $input['project_link'] = $request->link;
            $input['project_color'] = $request->color;
            $input['project_logo'] = $filename;
            $input['staff_ID'] = $request->staff_id;

            $yourdat = projects::create($input);

            if ($yourdat){
                $projects['pro'] = projects::orderBy('id', 'DESC')->simplePaginate(6);
                return view('allProjects')->with($projects)->with('successMsg','Project added successfully');

            }else{
                return view('addProduct')->with('successMsg','Operation not successful');
            }

        }

    }


    public function addProjectStaff(Request $request)
    {

           $validator_data = $request->validate([
                 'title' => ['required'],
                 'link' =>  ['required'],
                 'logo' =>  ['required']
               ],[
                'title.required'=>'project title required',
                'link.required'=>'project link required',
                'logo.required'=>'project logo required'
           ]);

//           $validator->validate();

           if ($validator_data){
            $image  = $request->file('logo');

            $filename    = $image->getClientOriginalName();


            Image::make($image)->save(public_path('/post/'.$filename));

            $input = [];
            $input['project_title'] = $request->title;
            $input['project_link'] = $request->link;
            $input['project_color'] = $request->color;
            $input['project_logo'] = $filename;
            $input['staff_ID'] = $request->staff_id;

            $yourdat = projects::create($input);

            if ($yourdat){
                $projects['pro'] = projects::orderBy('id', 'DESC')->simplePaginate(6);
                return view('staff.allProjects')->with($projects)->with('successMsg','Project added successfully');

            }else{
                return view('staff.addProduct')->with('successMsg','Operation not successful');
            }

           }

        }


    public function updateProject(Request $request)
    {

                $image      = $request->file('logo');

                $filename    = $image->getClientOriginalName();


                Image::make($image)->save(public_path('/post/'.$filename));

                $project =  projects::find($request->id);

                $project->project_title = $request->title;
                $project->project_link = $request->link;
                $project->project_color = $request->color;
                $project->project_logo = $filename;
                $project->staff_ID = $request->staff_id;


                $yourdat =  $project->save();

            if ($yourdat){

                $projects['pro'] = projects::orderBy('id', 'DESC')->simplePaginate(6);
                return view('allProjects')->with($projects)->with('successMsg','Project updated successfully');

            }


    }

    public function updateProjectStaff(Request $request)
    {

            $image      = $request->file('logo');

            $filename    = $image->getClientOriginalName();


             Image::make($image)->save(public_path('/post/'.$filename));

            $project =  projects::find($request->id);

            $project->project_title = $request->title;
            $project->project_link = $request->link;
            $project->project_color = $request->color;
            $project->project_logo = $filename;
            $project->staff_ID = $request->staff_id;


            $yourdat =  $project->save();

            if ($yourdat){

                $projects['pro'] = projects::orderBy('id', 'DESC')->simplePaginate(6);
                return view('staff.allProjects')->with($projects)->with('successMsg','Project updated successfully');

            }

    }


    public function search_projectStaff(Request $request)
    {
        $search_results = projects::where('project_title',$request->search)->first();

        if ($search_results){
           return view('staff.search_results',compact('search_results'));

        }else{
            $project['pro'] = projects::orderBy('id', 'DESC')->limit(5)->get();
            $projectCount = projects::all();

            return view('staff.dashboard')->with($project)->with('successMsg','No records')->with(compact('projectCount'));

        }
    }

    public function search_project(Request $request)
    {
        $search_results = projects::where('project_title',$request->search)->first();

        if ($search_results){
            return view('search_results',compact('search_results'));

        }else{
            $project['pro'] = projects::orderBy('id', 'DESC')->limit(5)->get();
            $projectCount = projects::all();
            $userCount = staff::all();
            $logCount = logs::all();
            $authlogs = auth_logs::all();
            return view('dashboard')->with($project)->with(compact('projectCount','userCount'))->with(compact('logCount','authlogs'));

        }
    }




}
