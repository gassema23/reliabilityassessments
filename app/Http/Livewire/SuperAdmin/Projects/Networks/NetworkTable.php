<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Detail,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent
};

final class NetworkTable extends PowerGridComponent
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
            Exportable::make(Str::ucfirst(__('generals.titles.networks').'-'.Carbon::now()->format('YmdHis')))
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
     * @return Builder<\App\Models\Network>
     */
    public function datasource(): Builder
    {
        return Network::query()->with(['city', 'technology', 'project', 'teams']);
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
            'city'       => [
                'city_name',
            ],
            'technology' => [
                'technology_name',
            ],
            'project'    => [
                'project_no',
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
            ->addColumn('project.project_no')
            ->addColumn('city.city_name')
            ->addColumn('technology.technology_name')
            ->addColumn('network_no')
            ->addColumn('network_element')
            ->addColumn('network_name')
            ->addColumn('network_description')
            ->addColumn('network_complete_formatted_toggleable', function (Network $model) {
                return (is_null($model->network_complete)) ? false : true;
            })
            ->addColumn('network_due_date_formatted', fn(Network $model) => Carbon::parse($model->network_due_date)
                ->format('Y-m-d'));
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
            Column::make(__('generals.tables.complete'), 'network_complete_formatted_toggleable', 'network_complete')
                ->toggleable(),
            Column::make(__('generals.tables.number', ['name' => __('generals.forms.project')]), 'project.project_no')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.city')]), 'city.city_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.technology')]),
                'technology.technology_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.titles.network-no'), 'network_no')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.titles.network-element'), 'network_element')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.titles.due-date'), 'network_due_date_formatted', 'network_due_date')
                ->searchable()
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
                    [
                        'id'   => 'id',
                        'page' => 'projects.networks',
                        'title' => __('generals.titles.networks'),
                        'show' => true
                    ]),
        ];
    }

    /**
     * @param  string  $id
     * @param  string  $field
     * @param  string  $value
     *
     * @return void
     */
    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        $network = Network::query()->find($id);
        if ($value == 1) {
            $network->update([
                'network_complete' => Carbon::now(),
            ]);
        } elseif ($value == 0) {
            $network->update([
                'network_complete' => null,
            ]);
        }
    }

}
