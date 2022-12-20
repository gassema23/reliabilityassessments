<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-create',['name'=> __('generals.titles.project')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-create',['name'=> __('generals.titles.project')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="projects.project_no"
                         :label="Str::ucfirst(__('generals.titles.project_no'))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.planner'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.users.index')"
                    option-label="full_name"
                    wire:model.lazy="projects.planner_id"
                    option-value="id"
                    option-description="employe_id"
                    class="mb-4"
                    hide-empty-message
                />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.prime'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.users.index')"
                    option-label="full_name"
                    wire:model.lazy="projects.prime_id"
                    option-value="id"
                    option-description="employe_id"
                    class="mb-4"
                    hide-empty-message
                />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-datetime-picker
                    :label="Str::ucfirst(__('generals.forms.due-date'))"
                    wire:model.defer="projects.project_due_date"
                    without-time
                    display-format="YYYY-MM-DD"
                />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="projects.project_name"
                         :label="Str::ucfirst(__('generals.tables.name',['name'=>__('generals.titles.project')]))"
                />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-textarea wire:model.defer="projects.project_description"
                            :label="Str::ucfirst(__('generals.forms.description'))"
                />
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive spinner="save"
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
