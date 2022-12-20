<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-update',['name'=> __('generals.titles.network')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-update',['name'=> __('generals.titles.network')]) }}
        </x-slot>
        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.project'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.projects.index')"
                    option-label="project_no"
                    wire:model.defer="networks.project_id"
                    option-value="id"
                    option-description="project_name"
                    hide-empty-message
                />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.titles.technology'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.technologies.index')"
                    option-label="technology_name"
                    wire:model.defer="networks.technology_id"
                    option-value="id"
                    hide-empty-message
                />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.titles.clli'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.cities.index')"
                    option-label="city_name"
                    option-description="clli"
                    wire:model.defer="networks.city_id"
                    option-value="id"
                    hide-empty-message
                />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="networks.network_no"
                         :label="Str::ucfirst(__('generals.forms.network_no'))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="networks.network_element"
                         :label="Str::ucfirst(__('generals.forms.network_element'))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-datetime-picker
                    :label="Str::ucfirst(__('generals.forms.due-date'))"
                    wire:model.defer="networks.network_due_date"
                    without-time
                    display-format="YYYY-MM-DD"
                />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="networks.network_name"
                         :label="Str::ucfirst(__('generals.tables.name',['name'=>__('generals.titles.network')]))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-textarea wire:model.defer="networks.network_description"
                            :label="Str::ucfirst(__('generals.forms.description'))"/>
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive spinner="save"
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
