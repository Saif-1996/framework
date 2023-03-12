<?php

namespace App\Http\Controllers\api;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Imports\UsersImport;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use function PHPUnit\Framework\isEmpty;


class DbController extends Controller
{

    public function index()
    {
        $posts = ApiResource::collection(Post::get());
        return $this->apiResponse($posts, 'ok', 200);
    }

    public function custom(Request $r)
    {
        return Post::all($r[0]);

    }

    public function toexcel()
    {
        return Post::get();

    }


    public function apiResponse($data = null, $message = null, $status = null)
    {

        $array = [
            'data' => $data,
            'message' => $message,
            'status' => $status,
        ];

        return response($array, $status);

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $post = Post::create($request->all());

        if ($post) {
            return $this->apiResponse(new ApiResource($post), 'The post Save', 201);
        }

        return $this->apiResponse(null, 'The post Not Save', 400);
    }


    public function show($id)
    {

        $post = Post::find($id);

        if ($post) {
            return $this->apiResponse(new ApiResource($post), 'ok', 200);
        }
        return $this->apiResponse(null, 'The post Not Found', 404);


    }

    public function excel(Request $request)
    {
//        $r = $request['col'];
//        $r = ['id'];

//        return $request['col'];

        if (isEmpty($request)) {
            $rsp = new UsersExport();
            $rsp->array = $request['col'];
            return Excel::download($rsp, 'users.xlsx');


        }

//        $rsp = $rsp->array($this->toexcel());
        return Excel::download(new UsersExport(), 'users.xlsx');

    }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);

        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }
}
