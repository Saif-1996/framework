<?php

namespace App\Http\Controllers\Ajax;

use App\Exports\FormExport;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;


class ApiController extends Controller
{
    public function show()
    {
        return view('api.api');
    }


    public function exportForm()
    {
        return $_POST;

        return Excel::download(new FormExport($formData), 'form-data.xlsx');
    }

    public function import()
    {

        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function toex()
    {

        //        return Excel::download(new UsersExport, 'users.xlsx');
        //$response=Http::get()
    }
}
