<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-update',['name'=>__('area')])}}
        </h2>
    </x-slot>
    @livewire('super-admin.localizations.areas.area-edit',[$area])
</x-super-admin-layout>
