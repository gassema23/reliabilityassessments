<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Statuses;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public $status;

    /**
     * @param $task
     *
     * @return void
     */
    public function mount($status)
    {
        $this->status = Status::findOrFail($status);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->status->delete();
        return redirect()->route('super-admin.settings.statuses.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.desactivated')]));
    }

    public function close()
    {
        $this->forceClose()->closeModal();
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.super-admin.delete', [
            'title'   => __('generals.texts.title-desactivate', ['name' => __('generals.titles.status')]),
            'message' => __('generals.texts.descriptions-desactivate', ['name' => __('generals.titles.status')])
        ]);
    }
}
