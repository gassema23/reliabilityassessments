<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('super-admin.projects.projects.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('super-admin.projects.projects.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('super-admin.projects.projects.edit', ['project' => $project]);
    }
}
