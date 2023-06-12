<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profle=User::latest()->get();
        return view('profile.index',['profile'=>$profle]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile= User::findOrFail($id);
        return view('profile.show',['profile'=>$profile]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if($id==0){
            $profile=new User();
            return view('profile.form',['profile'=>$profile,'id'=>$id]);
        }else{

            $profile=User::findOrFail($id);
            return view('profile.form',['profile'=>$profile,'id'=>$id]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $data=$request->except('_token','_method');
        User::updateOrCreate(['id' => $id],$data);
        return redirect()->route('profile.index')->with('success','Your Profile is created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('profile.index');
    }

}
