<x-login-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-application-logo class="w-20 h-20"/>
        </x-slot>
        @livewire('auth.register')
    </x-auth-card>
</x-login-layout>
