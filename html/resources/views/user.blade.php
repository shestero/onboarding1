@extends('layout')
 
@php
require_once 'singularize.php'
@endphp

@section('content')
    <h3>Users with id={{ $id }}</h3>
    <p>{{ $user->name }} {{ $user->email }} <i>{{ singularize($user->group_name) }}</i></p>
    <img src="{{ env('AWS_ENDPOINT') }}/avatars/{{ $user->avatar }}" alt="avater" onerror="this.src='/Default_pfp.svg';this.onerror='';"/>
    <hr/>
    <a href="{{ url('users') }}">&lt;&lt; Back to user list</a>
@stop
