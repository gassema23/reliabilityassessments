<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'team_name',
    ];

    public function networks()
    {
        return $this->belongsToMany(Network::class)->withTimestamps();
    }

    public function taskTeams(){
        return $this->belongsToMany(Task::class)->using(TaskTeam::class);
    }
}
