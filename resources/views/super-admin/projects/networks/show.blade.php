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
                    <div class="text-slate-500 font-bold text-sm uppercase">{{$team->team_name}}</div>
                    <table class="w-full text-sm text-left text-slate-500 shadow mt-4">
                        <thead class="text-xs text-slate-700 uppercase bg-slate-50">
                        <tr>
                            <th scope="col" class="py-3 px-6 uppercase">{{__('generals.tables.title')}}</th>
                            <th scope="col" class="py-3 px-6 uppercase">{{__('generals.tables.date-start')}}</th>
                            <th scope="col" class="py-3 px-6 uppercase">{{__('generals.tables.deadline')}}</th>
                            <th scope="col" class="py-3 px-6 uppercase">{{__('generals.tables.completion')}}</th>
                        </tr>
                        </thead>
                        @foreach($team->taskTeams as $task)
                            <tr class="bg-white border-b hover:bg-slate-100 transition ease-in-out duration-500">
                                <td scope="row" class="py-4 px-6">{{$task->task_name}}</td>
                                <td class="py-4 px-6">{{ \Carbon\Carbon::parse($team->pivot->created_at)->diffForHumans() }}</td>
                                <td class="py-4 px-6">{{ \Carbon\Carbon::parse($network->due_date)->isoFormat('LL') }}</td>
                                <td class="py-4 px-6"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-super-admin-layout>
