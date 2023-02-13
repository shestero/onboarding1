@extends('layout')
 
@php
require_once 'singularize.php'
@endphp

@section('content')
    <h3>Users with roles</h3>
    @foreach($users as $user)
        <p>{{ $user->id }} <a href="{{ url('user',$user->id) }}">{{ $user->name }}</a> <i>{{ singularize($user->group_name) }}</i></p>
    @endforeach
@stop
