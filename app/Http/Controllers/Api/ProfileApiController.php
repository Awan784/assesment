<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\profile;
use App\Models\ReportHasUser;
use App\Models\User;
use Illuminate\Http\Request;
use Pdf;
class ProfileApiController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $user=User::latest()->get();
        return  response()->json(['profile' => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function get($id)
    {
        $profile= User::findOrFail($id);
        return  response()->json(['profile' => $profile]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request);
        $data=$request->except('_token','_method');
        $profile= User::updateOrCreate(['id' => $id],$data);
        ReportHasUser::where('profiles_id',$profile->id)->delete();
        foreach ($request->profile as $key => $value) {
            $profile=new ReportHasUser();
            $profile->profiles_id=$profile->id;
            $profile->users_id=$value;
            $profile->save();
        }
        return  response()->json(['success' => "Profile Updated Successfully"]);
    }
    public function create(Request $request)
    {

        // dd($request);
        $data=$request->except('_token','_method');
        $profile= User::updateOrCreate(['id' => 0],$data);
        foreach ($request->profile as $key => $value) {
            $profile=new ReportHasUser();
            $profile->profiles_id=$profile->id;
            $profile->users_id=$value;
            $profile->save();
        }
        return  response()->json(['success' => "Profile Created Successfully"]);
    }

    public function delete($id)
    {
        User::destroy($id);
        return  response()->json(['success' => "Profile Deleted Successfully"]);
    }

}
