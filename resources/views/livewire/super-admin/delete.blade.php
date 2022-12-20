<div>
    <div class="w-full max-w-md py-4 bg-white overflow-hidden sm:rounded-lg sm:justify-center items-center">
        <div class=" px-6 w-full content-center mb-3 border-b border-slate-200  pb-4">
            <h3 class="text-lg font-medium leading-6 text-slate-900" id="modal-title">
                {{ $title }}
            </h3>
        </div>
        <div class="text-sm text-slate-500 px-6 ">
            {{ $message }}
        </div>
    </div>
    <div class=" px-6 py-4 flex flex-row-reverse w-full border-t border-slate-200 bg-slate-100">
        <form wire:submit.prevent="destroy">
            <x-button class="ml-2" wire:click="destroy" loading-delay="long" wire:loading.attr="disabled" spinner="destroy" squared negative
                      :label="__('Desactivate')"/>
            <x-button type="button" squared dark spinner="close" :label="__('Cancel')" wire:click="close"/>
        </form>
    </div>
</div>
