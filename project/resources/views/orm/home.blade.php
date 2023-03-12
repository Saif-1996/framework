@extends('layouts.header')
@section('title')
    Orm -- Home
@endsection

@section('cont')
    <form class="row g-3"action="{{route('orm.store')}}" method="post"  >
        @csrf
        <div class="col-12">
            <label for="inputAddress2" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="inputAddress2" >
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">phone</label>
            <input type="text" name="phone" class="form-control" id="inputCity">
        </div>

        <div class="col-md-2">
            <label for="inputZip" class="form-label">email</label>
            <input type="text" name="email" class="form-control" id="inputZip">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">insert</button>
        </div>
    </form>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

        </tr>
        </thead>
        <tbody>
        @foreach($user as $user)

            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a class="btn btn-primary" href="{{route('orm.show',$user->id)}}" role="button">edit</a></td>
{{--                <td><a class="btn btn-primary" href="{{route('delete',$user->id)}}" role="button">delete</a></td>--}}
            </tr>

        @endforeach


        </tbody>
    </table>
@endsection



