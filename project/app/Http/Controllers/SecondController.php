<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//    return view('welcome')->with('text',8000000000000000);
//        return vie w('welcome')->with(['text'=>8000000000000000,'name'=>'saif']);
$data=[];
$data['name']='omar';
$data['id']=10;
$data['age']=30;
return view('welcome',$data);

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
