<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'login');

Route::middleware(['auth', 'verified'])
    ->group(function () {
        // Admin pannel
        Route::middleware('role:Super-Admin')
            ->prefix('super-admin')
            ->name('super-admin.')
            ->group(function () {
                // Dashboard
                Route::get('/', function () {
                    return view('super-admin.dashboard');
                })->name('dashboard');
                //Parameters
                Route::prefix('settings')
                    ->name('settings.')
                    ->group(function () {
                        // Users
                        Route::get('/users', [SuperAdmin\UserController::class, 'index'])->name('users.index');
                        Route::get('/users/edit/{user}',
                            [SuperAdmin\UserController::class, 'edit'])->name('users.edit');
                        // Teams
                        Route::get('/teams', [SuperAdmin\TeamController::class, 'index'])->name('teams.index');
                        // Roles
                        Route::get('/roles', [SuperAdmin\RoleController::class, 'index'])->name('roles.index');
                        // Statuses
                        Route::get('/statuses', [SuperAdmin\StatusController::class, 'index'])->name('statuses.index');
                        Route::get('/statuses/create',
                            [SuperAdmin\StatusController::class, 'create'])->name('statuses.create');
                        Route::get('/statuses/edit/{status}',
                            [SuperAdmin\StatusController::class, 'edit'])->name('statuses.edit');
                        // Technologies
                        Route::get('/technologies',
                            [SuperAdmin\TechnologyController::class, 'index'])->name('technologies.index');
                        Route::get('/technologies/create',
                            [SuperAdmin\TechnologyController::class, 'create'])->name('technologies.create');
                        Route::get('/technologies/edit/{technology}',
                            [SuperAdmin\TechnologyController::class, 'edit'])->name('technologies.edit');
                    });
                Route::prefix('localizations')
                    ->name('localizations.')
                    ->group(function () {
                        // Country
                        Route::get('/countries',
                            [SuperAdmin\CountryController::class, 'index'])->name('countries.index');
                        Route::get('/countries/create',
                            [SuperAdmin\CountryController::class, 'create'])->name('countries.create');
                        Route::get('/countries/edit/{country}',
                            [SuperAdmin\CountryController::class, 'edit'])->name('countries.edit');
                        // States
                        Route::get('/states',
                            [SuperAdmin\StateController::class, 'index'])->name('states.index');
                        Route::get('/states/create',
                            [SuperAdmin\StateController::class, 'create'])->name('states.create');
                        Route::get('/states/edit/{state}',
                            [SuperAdmin\StateController::class, 'edit'])->name('states.edit');
                        // Areas
                        Route::get('/areas',
                            [SuperAdmin\AreaController::class, 'index'])->name('areas.index');
                        Route::get('/areas/create',
                            [SuperAdmin\AreaController::class, 'create'])->name('areas.create');
                        Route::get('/areas/edit/{area}',
                            [SuperAdmin\AreaController::class, 'edit'])->name('areas.edit');
                        // Cities
                        Route::get('/cities',
                            [SuperAdmin\CityController::class, 'index'])->name('cities.index');
                        Route::get('/cities/create',
                            [SuperAdmin\CityController::class, 'create'])->name('cities.create');
                        Route::get('/cities/edit/{city}',
                            [SuperAdmin\CityController::class, 'edit'])->name('cities.edit');
                    });
                // Projects
                Route::prefix('projects')
                    ->name('projects.')
                    ->group(function () {
                        // Projects
                        Route::get('/projects',
                            [SuperAdmin\ProjectController::class, 'index'])->name('projects.index');
                        Route::get('/projects/create',
                            [SuperAdmin\ProjectController::class, 'create'])->name('projects.create');
                        Route::get('/projects/edit/{project}',
                            [SuperAdmin\ProjectController::class, 'edit'])->name('projects.edit');
                        // Networks
                        Route::get('/networks',
                            [SuperAdmin\NetworkController::class, 'index'])->name('networks.index');
                        Route::get('/networks/create',
                            [SuperAdmin\NetworkController::class, 'create'])->name('networks.create');
                        Route::get('/networks/edit/{network}',
                            [SuperAdmin\NetworkController::class, 'edit'])->name('networks.edit');
                        Route::get('/networks/show/{id}',
                            [SuperAdmin\NetworkController::class, 'show'])->name('networks.show');
                        // Tasks
                        Route::get('/tasks',
                            [SuperAdmin\TaskController::class, 'index'])->name('tasks.index');
                        Route::get('/tasks/create',
                            [SuperAdmin\TaskController::class, 'create'])->name('tasks.create');
                        Route::get('/tasks/edit/{task}',
                            [SuperAdmin\TaskController::class, 'edit'])->name('tasks.edit');
                    });
            });
        // Guest pannel
        Route::middleware('role:Guest')
            ->prefix('guest')
            ->name('guest.')
            ->group(function () {
                Route::get('/', function () {
                    return view('guest.dashboard');
                })->name('dashboard');
            });
    });
require __DIR__.'/auth.php';
