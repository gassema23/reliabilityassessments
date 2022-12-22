<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TeamProgression extends Component
{
    public Team $team;
    public $progression, $color, $countComplete = 0;

    public function mount(Team $team, $technology_id)
    {
        $nbTask = DB::table('task_team')
            ->where('team_id', '=', $team->id)
            ->join('tasks', 'tasks.id', '=', 'task_team.task_id')
            ->where('tasks.technology_id', '=', $technology_id)
            ->get()
            ->count();

        $task_team = DB::table('status_task')
            ->join('task_team', 'task_team.id', '=', 'status_task.task_team_id')
            ->where('task_team.team_id', '=', $team->id)
            ->get();
        $ar = [];
        foreach ($task_team as $k => $v) {
            if ($v->status_id == '9804dace-9f64-430f-9a67-5c079078b2a5') {
                $ar[] = $v->task_team_id;
            }
        }
        $this->progression = 0;
        if (count(array_unique($ar)) > 0) {
            $this->progression = round(count(array_unique($ar)) / $nbTask * 100);
        }
        if ($this->progression < 25) {
            $this->color = 'red';
        } elseif ($this->progression > 25 && $this->progression < 55) {
            $this->color = 'yellow';
        } else {
            $this->color = 'green';
        }
    }

    public function render()
    {
        return <<<'blade'
            <div class="bg-slate-200 w-full mt-1">
                <div style="" class="bg-{{$color}}-500 py-1 w-[{{ round($progression) }}%]"></div>
            </div>
        blade;
    }
}
