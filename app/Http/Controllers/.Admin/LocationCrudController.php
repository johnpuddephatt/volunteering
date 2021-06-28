<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LocationRequest as StoreRequest;
use App\Http\Requests\LocationRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class LocationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class LocationCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Location');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/location');
        $this->crud->setEntityNameStrings('location', 'locations');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $titleArray = [
            'name' => 'label',
            'type' => 'text',
        ];

        $addressFieldArray = [   // Address
            'name' => 'address',
            'label' => 'Address',
            'type' => 'address_google',
            // optional
            'country' => '["uk"]',
            'radius' => 5000,
            'location' => '53.6772339,-1.4042975',
            'store_as_json' => true,
        ];

        $this->crud->addFields([$titleArray, $addressFieldArray]);
        $this->crud->addColumns([$titleArray]);

        // add asterisk for fields that are required in LocationRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
