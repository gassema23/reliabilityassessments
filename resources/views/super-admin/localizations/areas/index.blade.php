<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.titles.list',['name'=> __('generals.titles.areas')]) }}
        </h2>
    </x-slot>
    <x-slot name="actions">
        <x-button squared secondary href="{{route('super-admin.localizations.areas.create')}}"
                  :label="__('generals.texts.title-create',['name'=>__('generals.titles.area')])"/>
    </x-slot>
    @livewire('super-admin.localizations.areas.area-table')
</x-super-admin-layout>
