<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-create',['name'=> __('generals.titles.network')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-create',['name'=> __('generals.titles.network')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.project'))"
                    always-fetch
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.projects.index')"
                    option-label="project_no"
                    wire:model.defer="project_id"
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
                    wire:model.defer="technology_id"
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
                    wire:model.defer="city_id"
                    option-value="id"
                    hide-empty-message
                />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.teams'))"
                    always-fetch
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.teams.index')"
                    option-label="team_name"
                    wire:model.defer="teams"
                    option-value="id"
                    hide-empty-message
                    multiselect
                />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="network_no"
                         :label="Str::ucfirst(__('generals.forms.network_no'))"
                         :value="old('network_no')"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="network_element"
                         :label="Str::ucfirst(__('generals.forms.network_element'))"
                         :value="old('network_element')"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-datetime-picker
                    :label="Str::ucfirst(__('generals.forms.due-date'))"
                    wire:model.defer="network_due_date"
                    without-time
                    display-format="YYYY-MM-DD"
                    :value="old('network_due_date')"
                />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="network_name"
                         :label="Str::ucfirst(__('generals.tables.name',['name'=>__('generals.titles.network')]))"
                         :value="old('network_name')"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-textarea wire:model.defer="network_description"
                            :label="Str::ucfirst(__('generals.forms.description'))"
                            :value="old('network_description')"/>
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive spinner="save"
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
