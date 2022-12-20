<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.titles.list',['name'=> __('generals.titles.roles')]) }}
        </h2>
    </x-slot>
    @livewire('super-admin.settings.roles.role-table')
</x-super-admin-layout>
