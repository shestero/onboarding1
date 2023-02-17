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
                        <p><div style="overflow: hidden; white-space: nowrap; vertical-align: middle;">
                        <div style="white-space: nowrap; display: inline-block; padding: 10px; vertical-align: middle;">
                            {{ $user->id }} <a href="{{ url('user',$user->id) }}" style="font: bold">{{ $user->name }}</a> 
                            ({{ singularize($user->group_name) }})</i>
                        </div>
                        @if (Auth::user()->isAdmin() && !$user->isAdmin())
                        <div class="items-center gap-4" style="padding: 2px; overflow: hidden; white-space: nowrap; display: inline-block;">
                            <a href="{{ url('promote',$user->id) }}" style="display: inline-block; vertical-align: middle;" 
                                class="items-center inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                promote to admin
                            </a>
                        </div>
                        <div class="items-center gap-4" style="padding: 2px; overflow: hidden; white-space: nowrap; display: inline-block;">
                            <a href="{{ url('user.delete',$user->id) }}" style="display: inline-block; vertical-align: middle;" 
                                class="items-center inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                delete
                            </a>
                        </div>
                        @endif
                        </div></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
