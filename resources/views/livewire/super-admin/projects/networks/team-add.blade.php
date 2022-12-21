<div>
    <form wire:submit.prevent="save">
        <div class="w-full max-w-md py-4 bg-white sm:rounded-lg sm:justify-center items-center">
            <div class=" px-6 w-full content-center mb-3 border-b border-slate-200  pb-4">
                <h3 class="text-lg font-medium leading-6 text-slate-900" id="modal-title">
                    {{ __('generals.texts.title-add',['name'=> __('generals.titles.teams')]) }}
                </h3>
            </div>
            <div class="text-sm text-slate-500 px-6">
                <x-select
                    :label="Str::ucfirst(__('generals.titles.team'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.teams.index')"
                    option-label="team_name"
                    wire:model.defer="teams"
                    option-value="id"
                    multiselect
                />
            </div>
        </div>
        <div class=" px-6 py-4 flex flex-row-reverse w-full border-t border-slate-200 bg-slate-100">
            <x-button class="ml-2" wire:click="save" spinner="save"
                      squared positive
                      :label="Str::title(__('generals.titles.save'))"/>
            <x-button type="button" squared dark spinner="close" :label="__('Cancel')" wire:click="close"/>
        </div>
    </form>

</div>
