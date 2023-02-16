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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div xclass="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <h4>Pages:</h4>
                <ul style="list-style: disc;">
                    <li><a href="{{ url('profile') }}">Your profile</a></li>
                    <li><a href="{{ url('user', Auth::user()->id) }}">Your user page</a></li>
                    <li><a href="{{ url('users') }}">List of users (+promote)</a></li>
                </ul>    
            </div>
        </div>
    </div>

</x-app-layout>
