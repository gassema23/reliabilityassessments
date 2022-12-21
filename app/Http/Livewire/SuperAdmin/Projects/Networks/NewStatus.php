<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class NewStatus extends ModalComponent
{
    public $status_id, $risk_name, $risk_action, $risk_description, $task_team, $network_id;

    public function mount($task_id, $team_id, $network_id)
    {
        $this->network_id = $network_id;
        $this->task_team = DB::table('task_team')
            ->where('task_id', '=', $task_id)
            ->where('team_id', '=', $team_id)
            ->get();
    }

    protected function rules()
    {
        return [
            'status_id'        => [
                'required'
            ],
            'risk_name'        => [
                'nullable',
                'required_with:risk_action'
            ],
            'risk_action'      => [
                'nullable',
                'required_with:risk_name'
            ],
            'risk_description' => [
                'required'
            ]
        ];
    }

    public function save()
    {
        $this->validate();
        $id = Str::uuid();
        $log = DB::table('status_task')->insert([
            'id'               => $id,
            'task_team_id'     => $this->task_team[0]['id'],
            'status_id'        => $this->status_id,
            'risk_name'        => $this->risk_name ?? null,
            'risk_action'      => $this->risk_action ?? null,
            'risk_description' => $this->risk_description,
            'created_at'       => now(),
            'updated_at'       => now()
        ]);

        activity()
            ->causedBy(auth()->user()->id)
            ->performedOn(new \App\Models\StatusTask())
            ->withProperties([
                'id'               => $id,
                'task_team_id'     => $this->task_team[0]['id'],
                'status_id'        => $this->status_id,
                'risk_name'        => $this->risk_name ?? null,
                'risk_action'      => $this->risk_action ?? null,
                'risk_description' => $this->risk_description,
                'created_at'       => now(),
                'updated_at'       => now()
            ])
            ->createdAt(now())
            ->event('created')
            ->log('created');

        $this->forceClose()->closeModal();
        return redirect()->route('super-admin.projects.networks.show', [$this->network_id])->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function close()
    {
        $this->forceClose()->closeModal();
    }

    public function render()
    {
        return view('livewire.super-admin.projects.networks.new-status');
    }

}
