<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-update',['name'=>__('task')])}}
        </h2>
    </x-slot>
    @livewire('super-admin.projects.tasks.task-edit',[$task])
</x-super-admin-layout>
