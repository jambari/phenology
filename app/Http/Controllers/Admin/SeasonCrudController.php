<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SeasonRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SeasonCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SeasonCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Season::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/season');
        CRUD::setEntityNameStrings('fenologi', 'fenologi');
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

        CRUD::column('informan');
        $this->crud->setColumnDetails('informan', ['label' => 'Informan']);
        CRUD::column('district_id');
        $this->crud->setColumnDetails('district_id', ['label' => 'Distrik']);
        CRUD::column('bulan');
        $this->crud->setColumnDetails('bulan', ['label' => 'bulan']);
        CRUD::column('tahun');
        $this->crud->setColumnDetails('tahun', ['label' => 'tahun']);
        CRUD::column('season');
        $this->crud->setColumnDetails('season', ['label' => 'Musim']);
        CRUD::column('remark');
        $this->crud->setColumnDetails('remark', ['label' => 'Keterangan']);
        CRUD::column('longitude');
        CRUD::column('latitude');
        CRUD::column('kabupaten');


       
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SeasonRequest::class);

        $user = backpack_auth()->user()->name;
        CRUD::addField([
            'name' => 'informan',
            'label' => 'Informan',
            'type' =>  'text',
            'default' => ucfirst($user),
        ]);

        CRUD::addField([
            'label'     => "Distrik",
            'type'      => 'select',
            'name'      => 'district_id', // the db column for the foreign key

            // optional
            // 'entity' should point to the method that defines the relationship in your Model
            // defining entity will make Backpack guess 'model' and 'attribute'
            'entity'    => 'district',

            // optional - manually specify the related model and attribute
            'model'     => "App\Models\District", // related model
            'attribute' => 'district_name', // foreign key attribute that is shown to user

            // optional - force the related options to be a custom query, instead of all();
            'options'   => (function ($query) {
                    return $query->orderBy('district_name', 'ASC')->get();
                }),
        ]);

        $month = date('m');

        CRUD::addField([
            'name' => 'bulan',
            'label' => 'bulan',
            'type'        => 'select_from_array',
            'options'     => ['01' => 'januari', '02' => 'februari', '03' => 'maret','04' => 'april', '05'=>'mei','06'=>'juni','07'=>'juli','08'=>'agustus','09'=>'september','10'=>'oktober','11'=>'november','12'=>'desember'],
            'allows_null' => false,
            'default' => $month,
        ]);

        $year = date('Y');

        CRUD::addField([
            'name' => 'tahun',
            'label' => 'tahun',
            'type' =>  'text',
            'default' => $year,
        ]);

        CRUD::addField([
            'name' => 'season',
            'label' => 'musim',
            'type' =>  'text'
        ]);

        CRUD::addField([
            'name' => 'remark',
            'label' => 'keterangan',
            'type' =>  'text'
        ]);

        CRUD::addField([
            'name' => 'gambar1',
            'type' => 'upload',
            'label' => "gambar 1",
            'upload'    => true,
            'disk'      => 'seasons', 
        ]);

        CRUD::addField([
            'name' => 'gambar2',
            'type' => 'upload',
            'label' => "gambar 2",
            'upload'    => true,
            'disk'      => 'seasons', 
        ]);

        CRUD::addField([
            'name' => 'gambar3',
            'type' => 'upload',
            'label' => "gambar 3",
            'upload'    => true,
            'disk'      => 'seasons', 
        ]);

        CRUD::addField([
            'name' => 'gambar4',
            'type' => 'upload',
            'label' => "gambar 4",
            'upload'    => true,
            'disk'      => 'seasons', 
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
