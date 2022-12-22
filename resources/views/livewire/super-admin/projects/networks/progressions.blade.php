<div>
    <div
        class="font-bold text-slate-800 uppercase pb-2 border-b border-slate-200">{{__('generals.texts.progress')}}</div>
    @foreach($network->teams as $team)
        <div class="mt-2">
            <div class="grid grid-cols-2">
                <div class="text-sm text-slate-600 font-bold uppercase">{{$team->team_name}}</div>
                <div
                    class="text-end text-xs text-slate-400">{{\Carbon\Carbon::parse($team->pivot->created_at)->format('y-m-d')}}</div>
            </div>
            @livewire('super-admin.projects.networks.team-progression',[$team,$network->technology_id])
        </div>
    @endforeach
</div>
