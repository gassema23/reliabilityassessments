<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    use HasFactory, SoftDeletes, HasUuids, Notifiable;

    protected $fillable = [
        'planner_id',
        'prime_id',
        'project_no',
        'project_name',
        'project_description',
        'project_complete',
        'project_due_date'
    ];

    public function prime()
    {
        return $this->belongsTo(User::class);
    }

    public function planner()
    {
        return $this->belongsTo(User::class);
    }
}
