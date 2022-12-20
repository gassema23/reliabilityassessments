<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Str::ucfirst(__('generals.titles.dashboard')) }}
        </h2>
    </x-slot>
    {{ __("You're logged in!") }}
</x-super-admin-layout>
