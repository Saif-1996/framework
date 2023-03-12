<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Controller;


class tow extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('');
    }
    public function take(){
        return 'welcom';
    }
    public function take2(){
    return 'welcom';
}
}
