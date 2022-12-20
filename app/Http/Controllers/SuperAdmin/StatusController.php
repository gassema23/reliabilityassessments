<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('super-admin.parameters.statuses.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.parameters.statuses.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Status  $status
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('super-admin.parameters.statuses.edit', ['status' => $status]);
    }
}
