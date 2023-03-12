@extends('layouts.header')
@section('title')
    Home
@endsection

@section('cont')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "{{{route('api.ajax')}}}",
                success: function (products) {
                    var o = JSON.stringify(products);
                    var o = JSON.parse(o);
                    var result = '';
                    // for (var i = 0; i < products.data.length; i++) {
                    //     result += '<tr><th scope="row">' + products.data[i].id + '</th>';
                    //     result += '<td>' + products.data[i].name + '</td>';
                    //     result += '<td>' + products.data[i].email + '</td>';
                    //     result += '<td><a class="btn btn-primary" href="http://localhost:8000/edit/' + products.data[i].id + '" role="button">edit</a></td>';
                    //     result += '<td><a class="btn btn-primary" href="http://localhost:8000/delete/' + products.data[i].id + '" role="button">delete</a></td>';
                    // }
                    $("#table-body").append(result);
                    // var o=products;
                    console.log(o.data[1].name);


                }
            });

        });
    </script>
    <form action="{{route('api.excel')}}" method="get">
        @csrf
        <select class="form-select colu" name="col[]" multiple="multiple" aria-label="multiple select example">

            <option value="id">id</option>
            <option value=name>name</option>
            <option value=created_at>created_at</option>
            <option value="email">email</option>
        </select>

        <button id="export1" type="submit" class="btn btn-primary test" role="button">Export to excel</button>
    </form>



{{--    to import file--}}
    <form action="{{route('api.excel')}}" method="get">
        @csrf
        <input type="file" id="myFile" name="filename">

        <button id="export" type="submit" class="btn btn-primary " role="button">Export to excel</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

        </tr>
        </thead>
        <tbody id="table-body">


        {{--        <a id="export" class="btn btn-primary " role="button">Test</a>--}}
        {{--        @foreach($request as $user)--}}

        {{--            <tr>--}}
        {{--                <th scope="row">{{$user->id}}</th>--}}
        {{--                <td>{{$user->name}}</td>--}}
        {{--                <td>{{$user->email}}</td>--}}
        {{--                <td><a class="btn btn-primary" href="{{route('edit',$user->id)}}" role="button">edit</a></td>--}}
        {{--                <td><a class="btn btn-primary" href="{{route('delete',$user->id)}}" role="button">delete</a></td>--}}
        {{--            </tr>--}}

        {{--        @endforeach--}}


        </tbody>
    </table>
    <script>
        $("#export").click(function () {
            {{--$.ajax({--}}
            {{--    type: 'GET',--}}
            {{--    url: "{{{route('api.excel')}}}",--}}
            {{--    // AJAX to Export excel--}}
            {{--});--}}
        });
    </script>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form method="post" action="{{route('api.register')}}">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">name</label>
            <div class="col-sm-10">
                <input type="name" name="name" class="form-control" id="inputEmail4">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPassword3">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
@endsection



