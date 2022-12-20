<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-update',['name'=>__('technology')])}}
        </h2>
    </x-slot>
    @livewire('super-admin.settings.technologies.technology-edit',[$technology])
</x-super-admin-layout>
