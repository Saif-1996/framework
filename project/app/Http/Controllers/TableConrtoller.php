<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableConrtoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('posts')->insert([
            'name'=>$request->name
            ,'phone'=>$request->phone
            ,'email'=>$request->email
        ]);
//        return view('test');
        return redirect()->route('first');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $request=DB::table('posts')->get();
//        return $users;
        return view('test',compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $user= DB::table('posts')->where('id',$id)->first();
        return view('edit',compact('user'));
//    return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    DB::table('posts')->where('id',$id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone

    ]);
    return redirect()->route('first');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('posts')->where('id',$id)->delete();
        return redirect()->route('first');

    }
}
