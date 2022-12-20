<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.titles.list',['name'=> __('generals.titles.cities')]) }}
        </h2>
    </x-slot>
    <x-slot name="actions">
        <x-button squared secondary href="{{route('super-admin.localizations.cities.create')}}"
                  :label="__('generals.texts.title-create',['name'=>__('generals.titles.city')])"/>
    </x-slot>
    @livewire('super-admin.localizations.cities.city-table')
</x-super-admin-layout>
