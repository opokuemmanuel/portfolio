<?php

namespace App\Http\Controllers;

use App\Models\auth_logs;
use App\Models\logs;
use App\Models\projects;
use App\Models\signUp;
use App\Models\staff;
use App\Models\UpdateStaff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class accessController extends Controller
{
    public function showSignUp()
    {
      return view('user.signupUser');
    }

    public function showLogin()
    {
      return view('user.loginUser');
    }

    public function checkID(Request $request)
    {
       $checkID = staff::where('staff_id',$request->staff_id)->first();

       if ($checkID){
           return response()->json(['status'=>200]);
       }else{
           return response()->json(['status'=>403]);
       }
    }

    public function loginUser(Request $request)
    {
        $validator_data = $request->validate([
            'staff_id' => ['required'],
            'password' => ['required'],

        ],[
            'staff_id.required'=>'staff id required',
            'password.required'=>'password required',

        ]);

        if ($validator_data){

            $credentials = $request->only('staff_id', 'password');

            if(Auth::attempt($credentials)){
                $moduleStaff = DB::table('staff')->where('staff_id','=',$request->staff_id)->first();
                $account = $moduleStaff->account_status;
                $role = $moduleStaff->role;

                // checking for account status
                if ($account == 'Active'){

                    // checking for role
                    if ($role == 'Admin'){
                        $project['pro'] = projects::orderBy('id', 'DESC')->limit(5)->get();
                        $projectCount = projects::all();
                        $userCount = staff::all();
                        $logCount = logs::all();
                        $authlogs = auth_logs::all();
                        return view('dashboard')->with($project)->with(compact('projectCount','userCount'))->with(compact('logCount','authlogs'));
                    }else{

                        $project['pro'] = projects::orderBy('id', 'DESC')->limit(5)->get();
                        $projectCount = projects::all();
                        return view('staff.homepage')->with($project)->with(compact('projectCount'));
                    }

                }else if ($account == 'Suspended'){
                    return view('user.loginUser')->with('successMsg','Account suspended contact system administrator for support');
                }

            }else{
                return view('user.loginUser')->with('successMsg','Incorrect Staff ID or password');

            }

        }



    }

    public function SignUpUser(Request $request)
    {
        $name_contact_staff_id = staff::where('name',$request->name)
                              ->where('contact',$request->contacts)
                              ->where('staff_id',$request->staff_id)->get();

        $check_contact = User::where('contacts',$request->contacts)->get();

        $check_staff = User::where('staff_id',$request->staff_id)->get();
        if (sizeof($check_contact) > 0){
            return response()->json(['status'=>405]);
        }elseif (sizeof($name_contact_staff_id) == 0){
            return response()->json(['status'=>404]);

        }elseif (sizeof($check_staff) > 0){
            return response()->json(['status'=>500]);
        }
        else{
            $user = [];
            $user['staff_id'] = $request->staff_id;
            $user['name'] = $request->name;
            $user['contacts'] = $request->contacts;
            $user['password'] =  Hash::make($request->password);


            $results = signUp::create($user);

            if ($results){

                return response()->json(['status'=>200]);

            }else{
                return response()->json(['status'=>403]);
            }
        }

    }
}
