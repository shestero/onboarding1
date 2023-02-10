@extends('layout')
 
@section('content')
    @foreach($users as $user)
        <p>{{ $user->name }} <i>{{ $user->group_name }}</i></p>
    @endforeach
@stop
