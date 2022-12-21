<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class RecentActivity extends Component
{
    public $activities = [];
    public $logs = [];
    public Network $network;

    public function mount(Network $network)
    {
        $this->activities = Activity::where('subject_type', 'like', '%NetworkTeam%')
            ->orderBy('id', 'DESC')
            ->take(10)
            ->get();
        $this->network = $network;
        foreach ($this->activities as $activity) {
            foreach ($activity->properties as $property) {
                if ($property['network_id'] === $network->id) {
                    $this->logs[] = [
                        'property'   => $property,
                        'team'       => Team::where('id', $property['team_id'])->first()->team_name,
                        'event'      => $activity->event,
                        'causer'     => User::where('id', $activity->causer_id)->first()->name->FullName(),
                        'created_at' => Carbon::parse($activity->created_at)->diffForHumans()
                    ];
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.super-admin.projects.networks.recent-activity');
    }
}
