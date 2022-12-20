<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-create',['name'=> __('generals.titles.city')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-create',['name'=> __('generals.titles.city')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.countries'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.countries.index')"
                    option-label="country_name"
                    wire:model.lazy="country_id"
                    option-value="id"
                    hide-empty-message
                />
            </div>

            @if(!is_null($country_id))
                <div class="col-span-6 sm:col-span-4">
                    <x-select
                        :label="Str::ucfirst(__('generals.forms.states'))"
                        :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                        wire:model.lazy="state_id"
                        :async-data="[
                            'api' => route('api.states.selected',$country_id),
                            'method' => 'POST',
                        ]"
                        option-value="id"
                        option-label="state_name"
                        hide-empty-message
                    />
                </div>
            @endif

            @if(!is_null($state_id))
                <div class="col-span-6 sm:col-span-4">
                    <x-select
                        :label="Str::ucfirst(__('generals.forms.areas'))"
                        :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                        wire:model.defer="area_id"
                        :async-data="[
                            'api' => route('api.areas.selected',$state_id),
                            'method' => 'POST',
                        ]"
                        option-value="id"
                        option-label="area_name"
                        hide-empty-message
                    />
                </div>
            @endif
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="clli"
                         :label="strtoupper(__('generals.titles.clli'))"
                         :value="old('clli')"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="city_name" :value="old('city_name')"
                         :label="__('generals.tables.name',['name'=>__('generals.titles.city')])"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="latitude" :value="old('latitude')"
                         :label="Str::ucfirst(__('generals.titles.latitude'))"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="longitude" :value="old('longitude')"
                         :label="Str::ucfirst(__('generals.titles.longitude'))"/>
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive spinner="save"
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
