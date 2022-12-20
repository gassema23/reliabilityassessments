<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Projects;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent
};

final class ProjectTable extends PowerGridComponent
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
            Exportable::make(Str::ucfirst(__('generals.titles.projects').'-'.Carbon::now()->format('YmdHis')))
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
     * @return Builder<\App\Models\Project>
     */
    public function datasource(): Builder
    {
        return Project::query()->with(['planner', 'prime']);
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
            'prime'   => [
                'f_name',
                'l_name'
            ],
            'planner' => [
                'f_name',
                'l_name'
            ],
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
            ->addColumn('planner_name', function (Project $model) {
                return e($model->planner->name->FullName());
            })
            ->addColumn('prime_name', function (Project $model) {
                return e($model->prime->name->FullName());
            })
            ->addColumn('project_no')
            ->addColumn('project_name')
            ->addColumn('project_complete_formatted_toggleable', function (Project $model) {
                return (is_null($model->project_complete)) ? false : true;
            })
            ->addColumn('project_due_date_formatted', fn(Project $model) => Carbon::parse($model->project_due_date)
                ->format('d/m/Y'));

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
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.planner')]), 'planner_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.prime')]), 'prime_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.titles.project-no'), 'project_no')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.project')]), 'project_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.titles.due-date'), 'project_due_date_formatted', 'project_due_date')
                ->sortable(),
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
                    ['id' => 'id', 'page' => 'projects.projects', 'title' => __('generals.titles.projects')]),
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
        $project = Project::query()->find($id);
        if ($value == 1) {
            $project->update([
                'project_complete' => Carbon::now(),
            ]);
        } elseif ($value == 0) {
            $project->update([
                'project_complete' => null,
            ]);
        }
    }

}
