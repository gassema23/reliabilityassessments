<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected static $logName = 'TeamModelLog';
    protected $fillable = [
        'team_name',
    ];

    public function networks()
    {
        return $this->belongsToMany(Network::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)->using(TaskTeam::class);
    }

    public function statuses($task_id)
    {
        return DB::table('status_task')
            ->join('task_team', 'task_team.id', '=', 'status_task.task_team_id')
            ->join('statuses', 'statuses.id', '=', 'status_task.status_id')
            ->where('task_team.team_id', '=', $this->id)
            ->where('task_team.task_id', '=', $task_id)
            ->orderBy('status_task.created_at', 'DESC')
            ->first();
    }
}
