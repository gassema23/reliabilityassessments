<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ Str::ucfirst(__('generals.titles.network'))}}
        </h2>
    </x-slot>
    <x-slot name="cardlayout">
        <div class="grid grid-cols-3 gap-3">
            <div class="bg-white shadow p-4 border-t-4 border-slate-500 max-h-60 overflow-y-auto soft-scrollbar">
                @livewire('super-admin.projects.networks.progressions')
            </div>
            <div class="bg-white shadow p-4 border-t-4 border-slate-500 max-h-60 overflow-y-auto soft-scrollbar">
                @livewire('super-admin.projects.networks.recent-activity')
            </div>

            <div class="bg-white shadow p-4 border-t-4 border-slate-500 max-h-60 overflow-y-auto soft-scrollbar">
                @livewire('super-admin.projects.networks.teams',[$network])
            </div>
    </x-slot>
</x-super-admin-layout>
