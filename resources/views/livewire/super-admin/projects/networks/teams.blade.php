<div>
    <div class="grid grid-cols-2 pb-2 border-b border-slate-200">
        <div class="font-bold text-slate-800 uppercase">{{__('generals.titles.teams')}}</div>
        <div class="text-end">
            <x-button type="button" sm squared secondary icon="plus"
                      wire:click.prevent="$emit('openModal','super-admin.projects.networks.team-add', [{{json_encode($network->id)}}])"
            />
        </div>
    </div>
    @foreach($network->teams as $team)
        <form>
            <div class="grid grid-cols-2 py-2 border-b border-slate-100">
                <div class="pt-2 pl-2 text-xs text-slate-600 font-bold uppercase">{{ $team->team_name }}</div>
                <div class="text-end content-end items-end align-middle">
                    <x-button
                        type="button" squared
                        wire:click.prevent="$emit('openModal','super-admin.projects.networks.team-delete', [{{json_encode($network->id)}},{{json_encode($team->id)}}])"
                        icon="trash" xs negative/>
                </div>
            </div>
        </form>
    @endforeach
</div>
