<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Network extends Model
{
    use HasFactory, SoftDeletes, HasUuids, LogsActivity;

    protected static $logName = 'NetworkModelLog';
    protected $fillable = [
        'project_id',
        'city_id',
        'technology_id',
        'network_no',
        'network_element',
        'network_name',
        'network_description',
        'network_complete',
        'network_due_date',
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)
            ->using(NetworkTeam::class)
            ->whereNull('network_team.deleted_at')
            ->withTimestamps();
    }
}
