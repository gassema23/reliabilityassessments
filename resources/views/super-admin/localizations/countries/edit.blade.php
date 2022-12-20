<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Str::ucfirst(__('generals.titles.update'))}} <span class='text-green-600'>{{$country->country_name }}</span>
        </h2>
    </x-slot>
    @livewire('super-admin.localizations.countries.country-edit',[$country])
</x-super-admin-layout>
