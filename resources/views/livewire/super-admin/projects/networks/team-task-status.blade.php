<div>
    @foreach($network->teams as $team)
        <div class="bg-white shadow p-4 my-4">
            <div class="text-slate-500 font-bold text-sm uppercase">{{$team->team_name}}</div>
            <table class="w-full text-sm text-left text-slate-500 shadow mt-4">
                <thead class="text-xs text-slate-700 uppercase bg-slate-50">
                <tr>
                    <th scope="col" class="py-3 px-6 uppercase">{{__('generals.tables.title')}}</th>
                    <th scope="col" class="py-3 px-6 uppercase">{{__('generals.tables.date-start')}}</th>
                    <th scope="col" class="py-3 px-6 uppercase">{{__('generals.tables.deadline')}}</th>
                    <th scope="col" class="py-3 px-6 uppercase">{{__('generals.tables.completion')}}</th>
                    <th scope="col" class="py-3 px-6 uppercase"></th>
                </tr>
                </thead>
                @foreach($team->tasks as $task)
                    @if($network->technology_id === $task->technology_id)
                        <tr class="bg-white border-b hover:bg-slate-100 transition ease-in-out duration-500">
                            <td class="py-4 px-6">{{$task->task_name}}</td>
                            <td class="py-4 px-6">{{ \Carbon\Carbon::parse($team->pivot->created_at)->diffForHumans() }}</td>
                            <td class="py-4 px-6">{{ \Carbon\Carbon::parse($network->due_date)->isoFormat('LL') }}</td>
                            <td class="py-4 px-6">
                                @if($team->statuses($task->id))
                                    <span class="py-1 px-2 text-white text-xs"
                                          style="background-color: {{$team->statuses($task->id)->color}}">{{$team->statuses($task->id)->status_name}}</span>
                                @else
                                    <span
                                        class="py-1 px-2 text-white bg-indigo-500 text-xs">{{Str::ucfirst(__('generals.titles.new'))}}</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-end">
                                @if($team->statuses($task->id))
                                    @if($team->statuses($task->id)->status_name !== 'Done')
                                        <x-button
                                            spinner
                                            wire:click.prevent="$emit('openModal','super-admin.projects.networks.new-status', [{{json_encode($task->id)}},{{json_encode($team->id)}},{{json_encode($network->id)}}])"
                                            label="New status"
                                            squared
                                            secondary
                                            xs
                                        />
                                    @endif
                                @else
                                    <x-button
                                        spinner
                                        wire:click.prevent="$emit('openModal','super-admin.projects.networks.new-status', [{{json_encode($task->id)}},{{json_encode($team->id)}},{{json_encode($network->id)}}])"
                                        label="New status"
                                        squared
                                        secondary
                                        xs
                                    />
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    @endforeach
</div>
