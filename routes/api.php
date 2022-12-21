<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('cities', [ApiController::class, 'cities'])->name('api.cities.index');
//Route::get('technologies', [ApiController::class, 'technologies'])->name('api.technologies.index');
Route::get('teams', [ApiController::class, 'teams'])->name('api.teams.index');
Route::get('roles', [ApiController::class, 'roles'])->name('api.roles.index');
Route::get('countries', [ApiController::class, 'countries'])->name('api.countries.index');
Route::get('states', [ApiController::class, 'states'])->name('api.states.index');
Route::get('users', [ApiController::class, 'users'])->name('api.users.index');
Route::post('states/{country_id}', [ApiController::class, 'statesSelected'])->name('api.states.selected');
Route::post('areas/{state_id}', [ApiController::class, 'areasSelected'])->name('api.areas.selected');
Route::get('projects', [ApiController::class, 'projects'])->name('api.projects.index');
Route::get('technologies', [ApiController::class, 'technologies'])->name('api.technologies.index');
Route::get('statuses', [ApiController::class, 'statuses'])->name('api.statuses.index');
