<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.texts.title-create',['name'=>__('state')])}}
        </h2>
    </x-slot>
    @livewire('super-admin.localizations.states.state-create')
</x-super-admin-layout>
