<div>
    <form wire:submit.prevent="save">
        <div class="w-full max-w-md py-4 bg-white overflow-hidden sm:rounded-lg sm:justify-center items-center">
            <div class=" px-6 w-full content-center mb-3 border-b border-slate-200  pb-4">
                <h3 class="text-lg font-medium leading-6 text-slate-900" id="modal-title">
                    {{ __('generals.texts.title-add',['name'=> __('generals.titles.teams')]) }}
                </h3>
            </div>
            <div class="text-sm text-slate-500 px-6">
                @foreach($teams as $team)
                    <x-checkbox id="team-{{$team->id}}" label="{{$team->team_name}}" wire:model.defer="team_id" value="{{$team->id}}"/>
                @endforeach
            </div>
        </div>
        <div class=" px-6 py-4 flex flex-row-reverse w-full border-t border-slate-200 bg-slate-100">
            <x-button class="ml-2" wire:click="save" loading-delay="long" wire:loading.attr="disabled" spinner="destroy"
                      squared positive
                      :label="Str::title(__('generals.titles.save'))"/>
            <x-button type="button" squared dark spinner="close" :label="__('Cancel')" wire:click="close"/>
        </div>
    </form>

</div>
