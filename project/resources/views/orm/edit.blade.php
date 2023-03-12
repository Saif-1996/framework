@extends('layouts.header')
@section('title')
    Home
@endsection

@section('cont')
    <form class="row g-3"action="{{route('orm.update',$user->id)}}" method="post"  >
        @csrf
        @method('PUT')
        <div class="col-12">
            <label for="inputAddress2" class="form-label">name</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="inputAddress2" >
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">phone</label>
            <input type="text" value="{{$user->phone}}" name="phone" class="form-control" id="inputCity">
        </div>

        <div class="col-md-2">
            <label for="inputZip" class="form-label">email</label>
            <input type="text" name="email" class="form-control" id="inputZip">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">insert</button>
        </div>
    </form>



@endsection



