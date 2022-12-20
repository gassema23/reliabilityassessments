<nav class="bg-white flex shadow">
    <div x-show="!isOpen()" class="flex">
        <a
            x-show="!isOpen()"
            @click.prevent="handleOpen()"
            class="p-3 bg-slate-900 text-white hover:bg-slate-700 hover:text-white" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>

        </a>
    </div>
    <div class="flex ml-auto text-sm">
        <x-dropdown>
            <x-slot name="trigger">
                <a class="block p-4 hover:bg-slate-700 hover:text-white" href="#">
                    {{auth()->user()->name->FullName()}}
                    <x-icon name="chevron-down" class="w-4 h-4 inline"/>
                </a>
            </x-slot>
            <x-dropdown.item href="{{ route('super-admin.settings.users.edit',auth()->user()->id)}}" :label="Str::title(__('generals.titles.profile'))" />
            <x-dropdown.item separator :label="Str::title(__('generals.titles.logout'))" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" />
        </x-dropdown>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</nav>
