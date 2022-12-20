<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.titles.list',['name'=> __('generals.titles.projects')]) }}
        </h2>
    </x-slot>
    <x-slot name="actions">
        <x-button squared secondary href="{{route('super-admin.projects.projects.create')}}"
                  :label="__('generals.texts.title-create',['name'=>__('generals.titles.project')])"/>
    </x-slot>
    @livewire('super-admin.projects.projects.project-table')

</x-super-admin-layout>
