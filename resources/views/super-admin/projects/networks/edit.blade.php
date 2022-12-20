<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-update',['name'=>__('network')])}}
        </h2>
    </x-slot>
    @livewire('super-admin.projects.networks.network-edit',[$network])
</x-super-admin-layout>
