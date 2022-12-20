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
        </div>
        <div class="grid grid-cols-1">
            @foreach($network->teams as $team)
                <div class="bg-white shadow p-4 my-4">
                    <div class="text-slate-500 font-bold text-sm uppercase">
                        {{$team->team_name}}
                    </div>
                    @foreach($team->taskTeams as $task)
                        <div class="pl-3 list-disc divide-y divide-slate-300 py-2">
                            {{$task->task_name}}
                        </div>
                    @endforeach

                </div>
            @endforeach
        </div>
    </x-slot>
</x-super-admin-layout>
