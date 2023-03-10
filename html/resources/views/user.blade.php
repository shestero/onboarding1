@php
require_once 'singularize.php'
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Info about the user with id={{ $id }}</h3>
                    <div style="display: inline-block; padding: 20px;">
                        <table border="0">
                        @foreach ($user->toArray() as $k => $v)
                            <tr><td align="right" style="font-weight: bold">{{ $k }}</td><td>:</td><td alight="left">{{ $v }}</td></tr>
                        @endforeach
                        </table>
                    </div>
                    <div style="display: inline-block; vertical-align: top;">{{ config('app.aws_url') }}
                        @if ($user->avatar>'')
                            <img src="{{ Storage::disk('s3')->url('/avatars/'.$user->avatar) }}" alt="avater" onerror="this.src='/Default_pfp.svg';this.onerror='';"/>
                        @else
                            <div>No avatar</div>
                        @endif
                        <p align="center"><a href="{{ url('avatar-upload') }}?userid={{ $id }}">Upload/change this avatar</a></p>
                    </div>
                    <hr/>
                    <a href="{{ url('users') }}">&lt;&lt; Back to user list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
