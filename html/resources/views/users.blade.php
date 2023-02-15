@extends('layout')
 
@php
require_once 'singularize.php'
@endphp

@section('content')
    <h3>Users with roles</h3>
    <br/>
    @foreach($users as $user)
        <p>{{ $user->id }} <a href="{{ url('user',$user->id) }}" style="font: bold">{{ $user->name }}</a> ({{ singularize($user->group_name) }})</i></p>
    @endforeach
@stop
