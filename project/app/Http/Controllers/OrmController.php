<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class OrmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Post::all();
//        return $user;
        return view('orm.home',compact('user'));
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
        $post=new Post();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->save();

//        OR
//        Post::created([
//            'name'=>$request->name,
//            'phone'=>$request->phone,
//            'email'=>$request->email
//        ]);
        return redirect('orm');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=Post::find($id);
        return view('orm.edit',compact('user'));
//        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::find($id);
        return $post;
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
