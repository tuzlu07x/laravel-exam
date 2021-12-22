<x-front-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card my-5">
        <div class="card-body">
            You're logged in!
        </div>
    </div>
    <x-slot name="aside">
        <div class="card my-5">
            <div class="card-body">
                You're logged in!
            </div>
        </div>
    </x-slot>
</x-front-layout>