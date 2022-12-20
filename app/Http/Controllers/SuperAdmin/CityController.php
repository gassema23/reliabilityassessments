<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('super-admin.localizations.cities.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('super-admin.localizations.cities.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('super-admin.localizations.cities.edit', ['city' => $city]);
    }
}
