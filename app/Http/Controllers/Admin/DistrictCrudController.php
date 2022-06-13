<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DistrictRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DistrictCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DistrictCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\District::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/district');
        CRUD::setEntityNameStrings('distrik', 'distrik');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
        CRUD::column('district_name');
        $this->crud->setColumnDetails('district_name', ['label' => 'Nama Distrik']);
        CRUD::column('kabupaten');
        $this->crud->setColumnDetails('kabupaten', ['label' => 'Kabupaten']);
        CRUD::column('longitude');
        $this->crud->setColumnDetails('longitude', ['label' => 'bujur']);
        CRUD::column('latitude');
        $this->crud->setColumnDetails('latitude', ['label' => 'lintang']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DistrictRequest::class);

        CRUD::addField([
            'name' => 'district_name',
            'label' => 'Nama Distrik',
            'type' =>  'text'
        ]);

        CRUD::addField([
            'name' => 'kabupaten',
            'label' => 'Kabupaten',
            'type' =>  'text'
        ]);

        CRUD::addField([
            'name' => 'longitude',
            'label' => 'bujur',
            'type' =>  'text'
        ]);

        CRUD::addField([
            'name' => 'latitude',
            'label' => 'lintang',
            'type' =>  'text'
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
