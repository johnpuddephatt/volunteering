<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use GuzzleHttp\Client;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrganisationRequest as StoreRequest;
use App\Http\Requests\OrganisationRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class OrganisationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrganisationCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Organisation');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/organisation');
        $this->crud->setEntityNameStrings('organisation', 'organisations');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $nameArray = [
            'name' => 'name',
            'label' => 'Organisation name',
            'type' => 'text',
            'attributes' => [
              'class' => 'form-control input-lg'
            ],
            'tab' => 'Organisation'
        ];

        $infoArray = [
            'name' => 'info',
            'label' => 'Organisation info',
            'type' => 'textarea',
            'tab' => 'Organisation'
        ];

        $contactNameArray = [
            'name' => 'contact_name',
            'label' => 'Contact name',
            'type' => 'text',
            'tab' => 'Contact'
        ];

        $contactRoleArray = [
            'name' => 'contact_role',
            'label' => 'Role',
            'type' => 'text',
            'tab' => 'Contact'
        ];

        $contactEmailArray = [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'tab' => 'Contact'
        ];

        $contactPhoneArray = [
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'text',
            'tab' => 'Contact'
        ];

        $contactWebsiteArray = [
            'name' => 'website',
            'label' => 'Website',
            'type' => 'text',
            'tab' => 'Contact'
        ];

        $logoFieldArray = [
            'name' => 'logo',
            'label' => 'Logo',
            'type' => 'image',
            'tab' => 'Organisation',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
        ];

        $photoFieldArray = [
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'image',
            'tab' => 'Organisation',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 2, // ommit or set to 0 to allow any aspect ratio
        ];

        $accountCreatedArray = [
            'name' => 'created_at',
            'label' => 'Date account created',
            'type' => 'text',
            'tab' => 'Account settings',
            'readonly'=>'readonly',
            'attributes' => [
                'readonly'=>'readonly'
            ]
        ];

        $lastLoginArray = [
            'name' => 'last_login',
            'label' => 'Date of last login',
            'type' => 'text',
            'tab' => 'Account settings',
            'readonly'=>'readonly',
            'attributes' => [
                'readonly'=>'readonly'
            ]
        ];

        $activeFieldArray = [
            'name' => 'active',
            'label' => 'Account enabled?',
            'type' => 'checkbox',
            'tab' => 'Account settings'
        ];


        $countColumnArray = [
            'name' => 'count',
            'label' => "Active opportunities",
            'type' => 'closure',
            'function' => function($entry) {
                return count($entry->opportunities);
            }
        ];

        $activeColumnArray = [
            'name' => 'active',
            'label' => "Account enabled?",
            'type' => 'check',
        ];

        $emailVerifiedColumnArray = [
            'name' => 'email_verified_at',
            'label' => "Email verified?",
            'type' => 'check',
        ];

        $this->crud->addColumns([$nameArray, $contactNameArray, $countColumnArray, $activeColumnArray, $emailVerifiedColumnArray, $lastLoginArray]);
        $this->crud->addFields([$nameArray, $infoArray, $logoFieldArray, $photoFieldArray, $contactNameArray, $contactRoleArray, $contactEmailArray, $contactPhoneArray, $contactWebsiteArray, $activeFieldArray, $accountCreatedArray, $lastLoginArray]);

        // add asterisk for fields that are required in OpportunityRequest
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
