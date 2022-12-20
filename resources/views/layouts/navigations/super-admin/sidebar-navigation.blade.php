<div x-show="isOpen()" class="fixed xl:static inset-0 flex bg-white bg-opacity-75 min-h-screen text-sm z-50">
    <div @click.away="handleAway()" class="w-72 text-white bg-slate-700 shadow">
        <div class="flex bg-slate-900 content-between border-b border-slate-600">
            <div class="p-3 w-full ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline mr-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                </svg>
                <span class="inline uppercase text-xs">{{config('app.name')}}</span>
            </div>
            <a @click.prevent="handleClose()" class="p-3 hover:bg-slate-800 flex-1 flex items-center" href="/">
                <x-icon name="x" class="h-5 w-5"/>
            </a>
        </div>
        <a class="flex items-center w-full p-3 hover:bg-slate-800 @if(Route::is('super-admin.dashboard')) bg-slate-800 @endif"
           href="{{route('super-admin.dashboard')}}">
            <x-icon name="presentation-chart-bar" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.dashboard'))}}
        </a>
        <div
            class="border-t border-slate-600 text-xs text-slate-300 pl-2 pt-4 mb-2">{{Str::title(__('generals.titles.projects'))}}</div>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.projects.projects.*')) bg-slate-800 @endif"
           href="{{route('super-admin.projects.projects.index')}}">
            <x-icon name="clipboard-list" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.projects'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.projects.networks.*')) bg-slate-800 @endif"
           href="{{route('super-admin.projects.networks.index')}}">
            <x-icon name="collection" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.networks'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.tasks.*')) bg-slate-800 @endif"
           href="{{route('super-admin.projects.tasks.index')}}">
            <x-icon name="clipboard-check" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.tasks'))}}
        </a>
        <div
            class="border-t border-slate-600 text-xs text-slate-300 pl-2 pt-4 mb-2">{{Str::title(__('generals.titles.localizations'))}}</div>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.localizations.countries.*')) bg-slate-800 @endif"
           href="{{route('super-admin.localizations.countries.index')}}">
            <x-icon name="globe" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.countries'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.localizations.states.*')) bg-slate-800 @endif"
           href="{{route('super-admin.localizations.states.index')}}">
            <x-icon name="location-marker" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.states'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.localizations.areas.*')) bg-slate-800 @endif"
           href="{{route('super-admin.localizations.areas.index')}}">
            <x-icon name="location-marker" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.areas'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.localizations.cities.*')) bg-slate-800 @endif"
           href="{{route('super-admin.localizations.cities.index')}}">
            <x-icon name="location-marker" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.cities'))}}
        </a>

        <div
            class="border-t border-slate-600 text-xs text-slate-300 pl-2 pt-4 mb-2">{{Str::title(__('generals.titles.settings'))}}</div>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.users.*')) bg-slate-800 @endif"
           href="{{route('super-admin.settings.users.index')}}">
            <x-icon name="users" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.users'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.teams.*')) bg-slate-800 @endif"
           href="{{route('super-admin.settings.teams.index')}}">
            <x-icon name="user-group" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.teams'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.roles.*')) bg-slate-800 @endif"
           href="{{route('super-admin.settings.roles.index')}}">
            <x-icon name="shield-check" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.roles'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.statuses.*')) bg-slate-800 @endif"
           href="{{route('super-admin.settings.statuses.index')}}">
            <x-icon name="chart-bar" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.statuses'))}}
        </a>
        <a class="flex items-center w-full p-3 pl-4 hover:bg-slate-800 @if(Route::is('*.technologies.*')) bg-slate-800 @endif"
           href="{{route('super-admin.settings.technologies.index')}}">
            <x-icon name="light-bulb" class="h-5 w-5 mr-3"/>
            {{Str::title(__('generals.titles.technologies'))}}
        </a>
    </div>
</div>
