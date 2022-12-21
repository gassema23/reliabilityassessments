<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Network;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class NetworkController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('super-admin.projects.networks.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('super-admin.projects.networks.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Network  $network
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Network $network)
    {
        return view('super-admin.projects.networks.edit', ['network' => $network]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $network = Network::where('id', $id)->with(['teams','teams.user'])->first();
        return view('super-admin.projects.networks.show', [
            'network'   => $network
        ]);
    }
}
