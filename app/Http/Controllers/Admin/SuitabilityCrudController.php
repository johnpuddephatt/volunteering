<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SuitabilityRequest as StoreRequest;
use App\Http\Requests\SuitabilityRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class SuitabilityCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SuitabilityCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Suitability');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/suitability');
        $this->crud->setEntityNameStrings('suitability', 'suitabilities');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $labelArray = [
            'name' => 'label',
            'type' => 'text',
        ];
        $slugArray = [
            'name' => 'slug',
            'type' => 'text',
        ];
        $imageFieldArray = [
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0.667, // ommit or set to 0 to allow any aspect ratio
        ];

        $this->crud->addColumns([$labelArray]);
        $this->crud->addFields([$labelArray,$slugArray,$imageFieldArray]);

        // add asterisk for fields that are required in SuitabilityRequest
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
