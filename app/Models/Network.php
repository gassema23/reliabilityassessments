<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Network extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

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
        return $this->belongsToMany(Team::class)->withTimestamps();
    }
}
