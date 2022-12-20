<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Users;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public $users;

    /**
     * @param $users
     *
     * @return void
     */
    public function mount($users)
    {
        $this->users = User::findOrFail($users);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->users->delete();
        return redirect()->route('super-admin.settings.users.index')->with('success',
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
            'title'   => __('generals.texts.title-desactivate', ['name' => __('generals.titles.user')]),
            'message' => __('generals.texts.descriptions-desactivate', ['name' => __('generals.titles.user')])
        ]);
    }
}
