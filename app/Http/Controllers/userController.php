<?php

namespace App\Http\Controllers;

use App\Models\projects;
use App\Models\staff;
use App\Models\UpdateStaff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function show()
    {
      return view('admin.addStaff');
    }

    public function allUsers()
    {
      $allStaff['staff'] = staff::all();
      return view('admin.allStaff')->with($allStaff);
    }

    public function Staff(Request $request)
    {
        $input =[];
        $input['staff_id'] = $request->staff_id;
        $input['name'] = $request->name;
        $input['role'] = $request->role;
        $input['contact'] = $request->contact;
        $input['account_status'] = $request->account_status;

        $check_staff_id = staff::where('staff_id',$request->staff_id)->get();

        if (sizeof($check_staff_id)==0){
            $result = staff::create($input);
            if ($result){
                return response()->json(['status'=>200]);
            }else{
                return response()->json(['status'=>404]);
            }
        }else{
            return response()->json(['status'=>403]);
        }

    }


    public function ShowEdit($id=null)
    {
           $showEdit = staff::where('id',$id)->first();
           return view('admin.editStaff',compact('showEdit'));

    }

    public function update(Request $request)
    {
        $staff_members =  staff::find($request->id);

        $staff_members->staff_id = $request->staff_id;
        $staff_members->name = $request->name;
        $staff_members->role = $request->role;
        $staff_members->contact = $request->contact;
        $staff_members->account_status = $request->account_status;


        $results =  $staff_members->save();

        if ($results){
            return response()->json(['status'=>200]);
        }else{
            return response()->json(['status'=>404]);
        }
    }

    public function delete($staff_id=null)
    {

        $moduleStaff = DB::table('users')->where('staff_id','=',$staff_id)->first();

        if ($moduleStaff ){
            $userId = $moduleStaff->id;
            UpdateStaff::find($staff_id)->delete();
            User::find($userId)->delete();

            $allStaff['staff'] = staff::all();
            return view('admin.allStaff')->with($allStaff)->with('successMsg','details deleted successfully');

        }else{
            UpdateStaff::find($staff_id)->delete();

            $allStaff['staff'] = staff::all();
            return view('admin.allStaff')->with($allStaff)->with('successMsg','details deleted successfully');
        }

    }




}
