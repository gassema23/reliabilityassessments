<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class StatusTask extends pivot
{
    use HasFactory, SoftDeletes, HasUuids, LogsActivity;

    protected $table = 'status_task';

    protected static $logName = 'TaskModelLog';
    protected $fillable = [
        'task_team_id',
        'status_id',
        'risk_name',
        'risk_action',
        'risk_description',
        'task_complete'
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }
}
