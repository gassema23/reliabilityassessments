<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-update',['name'=> __('generals.titles.status')]) }}
        </h2>
    </x-slot>
    @livewire('super-admin.settings.statuses.status-update',[$status])
</x-super-admin-layout>
