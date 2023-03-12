<?php

namespace App\Exports;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use function PHPUnit\Framework\isEmpty;


class UsersExport implements FromArray
{
    public $array=null;

    public function array(): array
    {
//if null export for all col in a table else bring some Col
        if ($this->array==null) {
            $data = json_decode(Http::get('http://localhost/project/public/api/toexcel'));
        } else {
            $data = json_decode(Http::get('http://localhost/project/public/api/qu', [
                $this->array
            ]));
        }
//        $response = Http::get('http://example.com/users', [
//            'name' => 'Taylor',
//            'page' => 1,
//        ]);


        return $data;

//        return json_decode($data);
    }
}
