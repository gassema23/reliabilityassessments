<x-login-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-application-logo class="w-20 h-20"/>
        </x-slot>
        <form method="POST" action="{{ route('login') }}">

            <x-errors class="my-4"/>
            @csrf
            <!-- Email Address -->
            <div>
                <x-input wire:model="login" :label="Str::ucfirst(__('generals.titles.login'))" :value="old('login')"/>
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-inputs.password wire:model="password" :label="Str::ucfirst(__('generals.titles.password'))"/>
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <x-checkbox id="right-label" :label="Str::ucfirst(__('generals.titles.remember'))"
                                wire:model.defer="remember"/>
            </div>
            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-slate-600 hover:text-slate-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 mr-2"
                   href="{{ route('register') }}">
                    {{ Str::ucfirst(__('generals.titles.register')) }}
                </a> /
                @if (Route::has('password.request'))
                    <a class="ml-2
                    underline text-sm text-slate-600 hover:text-slate-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
                       href="{{ route('password.request') }}">
                        {{ Str::ucfirst(__('generals.titles.forgot',['type'=> __('password')])) }}
                    </a>
                @endif
            </div>
            <x-button spinner squared positive type="submit" :label="Str::ucfirst(__('generals.forms.log-in'))"
                      class="block w-full mt-4"/>
        </form>
    </x-auth-card>
</x-login-layout>
