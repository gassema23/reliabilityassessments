<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Project;
use App\Models\Role;
use App\Models\State;
use App\Models\Team;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function cities(Request $request): Collection
    {
        return City::query()
            ->select('id', 'city_name', 'clli')
            ->orderBy('city_name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('city_name', 'like', "%{$request->search}%")
                    ->orWhere('clli', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn(Builder $query) => $query->limit(10)
            )
            ->get()
            ->map(function (City $city) {
                return $city;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function users(Request $request): Collection
    {
        return User::query()
            ->select('id', DB::raw('CONCAT(f_name, \' \', l_name) AS full_name'), 'f_name', 'l_name', 'employe_id')
            ->orderBy('full_name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('f_name', 'like', "%{$request->search}%")
                    ->Orwhere('l_name', 'like', "%{$request->search}%")
                    ->Orwhere('employe_id', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get()
            ->map(function (User $user) {
                return $user;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function projects(Request $request): Collection
    {
        return Project::query()
            ->select('id', 'project_no', 'project_name')
            ->orderBy('project_no')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('project_no', 'like', "%{$request->search}%")
                    ->orWhere('project_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get()
            ->map(function (Project $project) {
                return $project;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function technologies(Request $request): Collection
    {
        return Technology::query()
            ->select('id', 'technology_name')
            ->orderBy('technology_name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('technology_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get()
            ->map(function (Technology $technology) {
                return $technology;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function teams(Request $request): Collection
    {
        return Team::query()
            ->select('id', 'team_name')
            ->orderBy('team_name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('team_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get()
            ->map(function (Team $team) {
                return $team;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function roles(Request $request): Collection
    {
        return Role::query()
            ->select('id', 'role_name')
            ->orderBy('role_name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('role_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get()
            ->map(function (Role $role) {
                return $role;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function countries(Request $request): Collection
    {
        return Country::query()
            ->select('id', 'country_name')
            ->orderBy('country_name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('country_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get()
            ->map(function (Country $country) {
                return $country;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function states(Request $request): Collection
    {
        return State::query()
            ->select('id', 'state_name')
            ->orderBy('state_name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('state_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get()
            ->map(function (State $state) {
                return $state;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function statesSelected(Request $request, $country_id): Collection
    {
        return State::query()
            ->select('id', 'state_name')
            ->orderBy('state_name')
            ->where('country_id', $country_id)
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('state_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get()
            ->map(function (State $state) {
                return $state;
            });
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function areasSelected(Request $request, $state_id): Collection
    {
        return Area::query()
            ->select('id', 'area_name')
            ->orderBy('area_name')
            ->where('state_id', $state_id)
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('area_name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get()
            ->map(function (Area $area) {
                return $area;
            });
    }
}
