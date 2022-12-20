<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-create',['name'=>__('country')])}}
        </h2>
    </x-slot>
    @livewire('super-admin.localizations.countries.country-create')
</x-super-admin-layout>
