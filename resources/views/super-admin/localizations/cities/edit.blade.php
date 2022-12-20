<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-edit',['name'=>__('city')])}}
        </h2>
    </x-slot>
    @livewire('super-admin.localizations.cities.city-edit',[$city])
</x-super-admin-layout>
