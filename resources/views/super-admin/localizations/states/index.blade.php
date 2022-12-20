<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('generals.titles.list',['name'=> __('generals.titles.states')]) }}
        </h2>
    </x-slot>
    <x-slot name="actions">
        <x-button squared secondary href="{{route('super-admin.localizations.states.create')}}"
                  :label="__('generals.texts.title-create',['name'=>__('generals.titles.state')])"/>
    </x-slot>
    @livewire('super-admin.localizations.states.state-table')
</x-super-admin-layout>
