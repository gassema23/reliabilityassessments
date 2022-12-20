<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent
};
use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Rules\{RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class UserTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();
        return [
            Exportable::make(Str::ucfirst(__('generals.titles.users').'-'.Carbon::now()->format('YmdHis')))
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\User>
     */
    public function datasource(): Builder
    {
        return User::query()
            ->with(['team', 'role']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [
            'team' => [
                'team_name'
            ],
            'role' => [
                'role_name'
            ]
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('approved_at_toggleable', function (User $model) {
                return (is_null($model->approved_at)) ? false : true;
            })
            ->addColumn('employe_id')
            ->addColumn('full_name', function (User $model) {
                return e($model->name->FullName());
            })
            ->addColumn('role.role_name')
            ->addColumn('team.team_name')
            ->addColumn('email');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make(__('generals.tables.approved'), 'approved_at_toggleable', 'approved_at')
                ->toggleable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.full')]), 'full_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.employee-id'), 'employe_id')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.email'), 'email')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.roles'), 'role.role_name')
                ->searchable(),
            Column::make(__('generals.tables.teams'), 'team.team_name')
                ->searchable(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::add('button-group-action')
                ->bladeComponent('button-group-action',
                    ['id' => 'id', 'page' => 'settings.users', 'title' => __('generals.titles.users')]),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */


    /**
     * @param  string  $id
     * @param  string  $field
     * @param  string  $value
     *
     * @return void
     */
    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        $user = User::query()->find($id);
        if ($value == 1) {
            $user->update([
                'approved_at' => Carbon::now(),
            ]);
        } elseif ($value == 0) {
            $user->update([
                'approved_at' => null,
            ]);
        }
    }
}
