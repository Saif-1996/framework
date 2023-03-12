<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $response = Http::post('http://localhost/project/public/api/auth/toexcel', [
            'name' => $row[0],
            'email' => $row[1],
            'password' => Hash::make($row[2]),
        ]);
        return new User([
            $response
        ]);
    }
}
