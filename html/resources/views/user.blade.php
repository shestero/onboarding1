@extends('layout')
 
@php
require_once 'singularize.php'
@endphp

@section('content')
    <h3>Users with id={{ $id }}</h3>
    <div style="display: inline-block; padding: 20px;">
        <table border="0">
        @foreach ($user->toArray() as $k => $v)
            <tr><td align="right" style="font-weight: bold">{{ $k }}</td><td>:</td><td alight="left">{{ $v }}</td></tr>
        @endforeach
        </table>
    </div>
    <div style="display: inline-block; vertical-align: top;">
        <img src="{{ env('AWS_EXTERNAL_URL') }}/avatars/{{ $user->avatar }}" alt="avater" onerror="this.src='/Default_pfp.svg';this.onerror='';"/>
        <p align="center"><a href="{{ url('avatar-upload') }}?userid={{ $id }}">Upload/change this avatar</a></p>
    </div>
    <hr/>
    <a href="{{ url('users') }}">&lt;&lt; Back to user list</a>
@stop
