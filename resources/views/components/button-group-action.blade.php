<x-dropdown>
    <x-dropdown.header :label="Str::ucfirst(__('generals.titles.manage', ['name'=> $title
    ]))">
        @if(isset($show))
            <x-dropdown.item href="{{route('super-admin.'.$page.'.show',$id)}}"
                             :label="Str::ucfirst(__('generals.titles.show'))"/>
        @endif
        <x-dropdown.item href="{{route('super-admin.'.$page.'.edit',$id)}}"
                         :label="Str::ucfirst(__('generals.titles.edit'))"/>
        <x-dropdown.item :label="Str::ucfirst(__('generals.titles.delete'))"
                         wire:click="$emit('openModal','super-admin.{{$page}}.delete', [{{json_encode($id)}}])"/>
    </x-dropdown.header>
</x-dropdown>
