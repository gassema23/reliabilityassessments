<x-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ Str::ucfirst(__('generals.titles.network'))}} / {{$network->network_element}}
        </h2>
        <div class="text-xs text-slate-600 mt-2 pl-2">
            <div class="font-bold">{{$network->network_name}}</div>
            <div>{{Str::ucfirst(__('generals.titles.prime')).': '.$network->project->prime->name->FullName()}}</div>
            <div>{{Str::ucfirst(__('generals.titles.planner')).': '.$network->project->planner->name->FullName()}}</div>
            <div>{{Str::ucfirst(__('generals.titles.due-date')).': '.$network->network_due_date}}</div>
        </div>
    </x-slot>
    <x-slot name="cardlayout">
        <div class="grid grid-cols-3 gap-3">
            <div class="bg-white shadow p-4 border-t-4 border-slate-500 max-h-60 overflow-y-auto soft-scrollbar">
                @livewire('super-admin.projects.networks.progressions',[$network])
            </div>
            <div class="bg-white shadow p-4 border-t-4 border-slate-500 max-h-60 overflow-y-auto soft-scrollbar">
                @livewire('super-admin.projects.networks.recent-activity',[$network])
            </div>

            <div class="bg-white shadow p-4 border-t-4 border-slate-500 max-h-60 overflow-y-auto soft-scrollbar">
                @livewire('super-admin.projects.networks.teams',[$network])
            </div>
        </div>
        <div class="grid grid-cols-1">
            @livewire('super-admin.projects.networks.team-task-status',[$network])
        </div>
    </x-slot>
</x-super-admin-layout>
