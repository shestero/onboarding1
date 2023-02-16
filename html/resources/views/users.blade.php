@php
require_once 'singularize.php'
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Users with roles</h3> (clickable):
                    <br/>
                    @foreach($users as $user)
                        <p>{{ $user->id }} <a href="{{ url('user',$user->id) }}" style="font: bold">{{ $user->name }}</a> ({{ singularize($user->group_name) }})</i></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
