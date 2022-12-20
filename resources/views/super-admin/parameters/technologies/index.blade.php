<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.titles.list',['name'=> __('generals.titles.technologies')]) }}
        </h2>
    </x-slot>

    <x-slot name="actions">
        <x-button squared secondary href="{{route('super-admin.settings.technologies.create')}}"
                  :label="__('generals.texts.title-create',['name'=>__('generals.titles.technology')])"/>
    </x-slot>
    @livewire('super-admin.settings.technologies.technology-table')
</x-super-admin-layout>
