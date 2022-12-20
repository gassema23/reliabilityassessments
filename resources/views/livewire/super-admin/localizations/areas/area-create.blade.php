<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-create',['name'=> __('generals.titles.area')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-create',['name'=> __('generals.titles.area')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="area_name"
                         :label="__('generals.tables.name',['name'=>__('generals.titles.area')])"
                         :value="old('area_name')"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="area_shortname" :value="old('area_shortname')"
                         :label="__('generals.tables.short-name',['name'=>__('generals.titles.area')])"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.countries'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.countries.index')"
                    option-label="country_name"
                    wire:model.lazy="selectedCountry"
                    option-value="id"
                    class="mb-4"
                    hide-empty-message
                />
                @if(!is_null($selectedCountry))
                    <x-select
                        :label="Str::ucfirst(__('generals.forms.states'))"
                        :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                        wire:model.defer="state_id"
                        :async-data="[
                            'api' => route('api.states.selected',$selectedCountry),
                            'method' => 'POST',
                        ]"
                        option-value="id"
                        option-label="state_name"
                        hide-empty-message
                    />
                @endif
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive spinner="save"
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
