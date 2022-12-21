<div>
    <form wire:submit.prevent="save">
        <div class="w-full max-w-md py-4 bg-white sm:rounded-lg sm:justify-center items-center">
            <div class=" px-6 w-full content-center mb-3 border-b border-slate-200  pb-4">
                <h3 class="text-lg font-medium leading-6 text-slate-900" id="modal-title">
                    {{ __('generals.texts.title-add',['name'=> __('generals.titles.status')]) }}
                </h3>
            </div>
            <div class="text-sm text-slate-500 px-6 my-2">
                <x-select
                    :label="Str::ucfirst(__('generals.titles.status'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.statuses.index')"
                    option-label="status_name"
                    wire:model.defer="status_id"
                    option-value="id"
                />
            </div>
            <div class="text-sm text-slate-500 px-6 my-2">
                <x-input
                    :label="Str::ucfirst(__('generals.forms.risk'))"
                    wire:model.defer="risk_name"
                />
            </div>
            <div class="text-sm text-slate-500 px-6 my-2">
                <x-input
                    :label="Str::ucfirst(__('generals.forms.action'))"
                    wire:model.defer="risk_action"
                />
            </div>
            <div class="text-sm text-slate-500 px-6 my-2">
                <x-textarea
                    :label="Str::ucfirst(__('generals.forms.description'))"
                    wire:model.defer="risk_description"
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
