<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use http\Message\Body;

class FromapiController extends BaseController
{
    public function index()
    {
        $curl=service('curlrequest');
        $data=$curl->request('GET','http://localhost/api-project/public/api/students',[
            'headers'=>[
                'Accept'=>'application/json'
            ]
            ]);
//        $data->ge;
        echo '' ;
        print_r($data->getBody());
    }
    public function excel(){
//        return view('export_excel');
        $curl=service('curlrequest');
        $data=$curl->request('GET','http://localhost/api-project/public/api/students',[
            'headers'=>[
                'Accept'=>'application/json'
            ]
        ]);
//        $data->ge;
        $data=json_decode($data->getBody(),true);


        return view('export_excel',$data);
    }
}
