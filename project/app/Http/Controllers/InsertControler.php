<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertControler extends Controller
{
    public function insert(Request $request){
        DB::table('posts')->insert([
            'name'=>$request->name
            ,'phone'=>$request->phone
            ,'email'=>$request->email
        ]);
        return response("تم بنجاح");
return $request;
    }
}
