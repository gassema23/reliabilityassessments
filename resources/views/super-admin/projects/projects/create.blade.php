<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-create',['name'=>__('project')])}}
        </h2>
    </x-slot>
    @livewire('super-admin.projects.projects.project-create')
</x-super-admin-layout>
