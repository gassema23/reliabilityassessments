<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('super-admin.localizations.areas.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('super-admin.localizations.areas.create');
    }

    /**
     * @param  \App\Models\Area  $area
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function edit(Area $area)
    {
        return view('super-admin.localizations.areas.edit', ['area' => $area]);
    }
}
