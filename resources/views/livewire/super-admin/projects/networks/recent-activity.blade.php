<div>
    <div
        class="font-bold text-slate-800 uppercase pb-2 border-b border-slate-200">{{__('generals.texts.recentactivity')}}</div>
    <ol class="relative border-l border-slate-200 dark:border-slate-700 mt-2">
        @foreach($logs as $activity)
            <li class="mb-4 ml-4 group">
                <div
                    class="absolute w-3 h-3 bg-slate-200 rounded-full mt-1.5 -left-1.5 border border-white group-hover:bg-slate-700 group-hover:h-4 group-hover:w-4 group-hover:-left-2 transition ease-in-out duration-300"></div>
                <time class="mb-1 text-sm font-normal leading-none text-slate-300">
                    {{$activity['created_at']}}
                </time>
                <h3 class="text-xs text-slate-600 font-bold uppercase">{{Str::ucfirst($activity['event'])}} {{$activity['team']}}</h3>
                <span class="text-xs font-normal leading-none text-slate-300">{{$activity['causer']}}</span>
            </li>
        @endforeach
    </ol>
</div>
