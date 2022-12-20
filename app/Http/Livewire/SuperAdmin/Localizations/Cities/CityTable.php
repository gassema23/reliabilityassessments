<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Cities;

use App\Models\City;
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

final class CityTable extends PowerGridComponent
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
            Exportable::make(Str::ucfirst(__('generals.titles.cities').'-'.Carbon::now()->format('YmdHis')))
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
     * @return Builder<\App\Models\City>
     */
    public function datasource(): Builder
    {
        return City::query()->with(['area', 'area.state', 'area.state.country']);
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
            'area'               => ['area_name'],
            'area.state'         => ['state_name'],
            'area.state.country' => ['country_name'],
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
            ->addColumn('clli')
            ->addColumn('city_name')
            ->addColumn('area.area_name')
            ->addColumn('area.state.state_name')
            ->addColumn('area.state.country.country_name');
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
            Column::make(__('generals.titles.clli'), 'clli')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.city')]), 'city_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.area')]), 'area.area_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.state')]), 'area.state.state_name')
                ->sortable()
                ->searchable(),
            Column::make(__('generals.tables.name', ['name' => __('generals.titles.country')]),
                'area.state.country.country_name')
                ->sortable()
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
                ->bladeComponent('button-group-action', [
                    'id'    => 'id', 'page' => 'localizations.cities',
                    'title' => __('generals.titles.city')
                ]),
        ];
    }
}
