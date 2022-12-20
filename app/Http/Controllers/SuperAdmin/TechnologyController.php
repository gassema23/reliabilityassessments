<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('super-admin.parameters.technologies.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('super-admin.parameters.technologies.create');
    }

    /**
     * @param  \App\Models\Technology  $technology
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function edit(Technology $technology)
    {
        return view('super-admin.parameters.technologies.edit', ['technology' => $technology]);
    }
}
