<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use GuzzleHttp\Client;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OpportunityRequest as StoreRequest;
use App\Http\Requests\OpportunityRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

use App\Models\Opportunity;

/**
 * Class OpportunityCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OpportunityCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Opportunity');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/opportunity');
        $this->crud->setEntityNameStrings('opportunity', 'opportunities');
        $this->crud->orderBy('id', 'DESC');

        /*
        |--------------------------------------------------------------------------
        | Filters & Scopes
        |--------------------------------------------------------------------------
        */
        $this->crud->query = $this->crud->query->withoutGlobalScopes();
        $this->crud->model->clearGlobalScopes();

        $this->crud->addFilter([ // dropdown filter
          'name' => 'show',
          'type' => 'dropdown',
          'label'=> 'Show'
        ], [
          'all' => 'All opportunities',
          'active' => 'Only active opportunities',
          'expired' => 'Only expired opportunities',
        ], function($value) { // if the filter is active
            if($value == 'all') {
                $this->crud->query = $this->crud->query->withoutGlobalScopes();
                $this->crud->model->clearGlobalScopes();
            }
            if($value == 'active') {
              $this->crud->addClause('active');
            }
            if($value == 'expired') {
                $this->crud->query = $this->crud->query->withoutGlobalScopes();
                $this->crud->model->clearGlobalScopes();
                $this->crud->addClause('expired');
            }

        });

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */


        // About tab

        $titleArray = [
            'name' => 'title',
            'type' => 'text',
            'attributes' => [
              'class' => 'form-control input-lg'
            ],
            'tab' => 'About'
        ];

        $descriptionArray = [
            'name' => 'description',
            'type' => 'quill',
            'toolbar' => "[{ header: [2, 3, false] }],['bold', 'italic'],['link'],[{ list: 'ordered' }, { list: 'bullet' }]",
            'tab' => 'About'
        ];

        $introFieldArray = [
            'name' => 'intro',
            'label' => 'Intro',
            'type' => 'textarea',
            'tab' => 'About'
        ];

        $expensesFieldArray = [
            'name' => 'expenses',
            'label' => 'Expenses',
            'type' => 'textarea',
            'tab' => 'About',
            'attributes' => [
              'rows' => 5
            ],
        ];

        $placesArray = [
            'name' => 'places',
            'label' => 'Places available',
            'type' => 'number',
            'tab' => 'About'
        ];

        $statusHeading = [   // CustomHTML
            'name' => 'statusHeading',
            'type' => 'custom_html',
            'value' => '<h4>Status</h4>',
            'tab' => 'About'
        ];

        $activeFieldArray = [
            'name' => 'active',
            'label' => '<strong>Active?</strong> Uncheck to hide this opportunity on the site.',
            'type' => 'checkbox',
            'tab' => 'About',
        ];

        $renewFieldArray = [
            'name' => 'renew-button',
            'type' => 'view',
            'view' => 'backpack::crud.fields.renew',
            'tab' => 'About'
        ];

        // Organisation tab

        $organisationFieldArray = [  // Select2
           'label' => "Organisation",
           'type' => 'select2',
           'name' => 'organisation_id', // the db column for the foreign key
           'entity' => 'organisation', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\Organisation", // foreign key model
           'tab' => 'Organisation'
        ];

        $locationHeading = [   // CustomHTML
            'name' => 'locationHeading',
            'type' => 'custom_html',
            'value' => '<h4>Location</h4>',
            'tab' => 'Organisation'
        ];

        $fromHomeFieldArray = [
            'name' => 'from_home',
            'label' => 'From home?',
            'type' => 'checkbox',
            'tab' => 'Organisation'
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
            'tab' => 'Organisation'
        ];

        $contactHeading = [   // CustomHTML
            'name' => 'contactHeading',
            'type' => 'custom_html',
            'value' => '<h4>Contact</h4>',
            'tab' => 'Organisation'
        ];

        $phoneFieldArray = [
            'name' => 'phone',
            'label' => 'Phone number',
            'type' => 'text',
            'tab' => 'Organisation'
        ];

        $emailFieldArray = [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
            'tab' => 'Organisation'
        ];

        // Times tab

        $hoursHeading = [   // CustomHTML
            'name' => 'hoursHeading',
            'type' => 'custom_html',
            'value' => '<h4>Hours</h4>',
            'tab' => 'Times'
        ];

        $hoursFieldArray = [
            'name' => 'hours',
            'label' => 'Hours',
            'type' => 'number',
            'tab' => 'Times',
            'suffix' => 'hours per week',
            'hint' => 'Enter the approximate number of hours per week, leave blank if flexible or variable'
        ];

        $frequencyFieldArray = [ // select_from_array
            'name' => 'frequency',
            'label' => 'Frequency',
            'type' => 'select_from_array',
            'options' => ['one-off' => 'One-off', 'fixed' => 'Fixed period', 'ongoing' => 'Ongoing'],
            'allows_null' => false,
            'default' => 'ongoing',
            'tab' => 'Times'
        ];

        $dateHeading = [   // CustomHTML
            'name' => 'dateHeading',
            'type' => 'custom_html',
            'value' => '<h4>Dates</h4>',
            'tab' => 'Times'
        ];

        $startDateFieldArray = [
            'name' => 'start_date', // a unique name for this field
            'label' => 'Start date',
            'type' => 'date',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => 'Times'
        ];

        $endDateFieldArray = [
            'name' => 'end_date', // a unique name for this field
            'label' => 'End date',
            'type' => 'date',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => 'Times'
        ];

        $deadlineHeading = [   // CustomHTML
            'name' => 'deadlineHeading',
            'type' => 'custom_html',
            'value' => '<h4>Deadline</h4>',
            'tab' => 'Times'
        ];
        $deadlineFieldArray = [
            'name' => 'deadline', // a unique name for this field
            'label' => 'Deadline',
            'type' => 'date',
            'tab' => 'Times'
        ];



        // Categorisation tab


        $categoriesFieldArray = [
            'label' => "Categories",
            'type' => 'select2_multiple',
            'name' => 'categories', // the method that defines the relationship in your Model
            'entity' => 'categories', // the method that defines the relationship in your Model
            'attribute' => 'label', // foreign key attribute that is shown to user
            'model' => "App\Models\Category", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            'tab' => 'Categorisation'
        ];

        $requirementsFieldArray = [ // Table
            'name' => 'requirements',
            'label' => 'Requirements',
            'type' => 'select2_from_new',
            'tab' => 'Categorisation',
            'suggestions' => config('volunteering.requirements')
        ];

        $skillsNeededFieldArray = [
            'name' => 'skills_needed',
            'label' => 'Skills needed',
            'type' => 'select2_from_new',
            'tab' => 'Categorisation',
            'suggestions' => config('volunteering.skills')
        ];

        $skillsGainedFieldArray = [ // Table
            'name' => 'skills_gained',
            'label' => 'Skills gained',
            'type' => 'select2_from_new',
            'tab' => 'Categorisation',
            'suggestions' => config('volunteering.skills')
        ];

        $accessibilityFieldArray = [ // Table
            'name' => 'accessibilities',
            'label' => 'Accessibility',
            'type' => 'select2_multiple',
            'entity' => 'accessibilities', // the method that defines the relationship in your Model
            'attribute' => 'label', // foreign key attribute that is shown to user
            'model' => "App\Models\Accessibility", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            'tab' => 'Categorisation',

        ];

        $suitabilitiesFieldArray = [
            'label' => "Suitabilities",
            'type' => 'select2_multiple',
            'name' => 'suitabilities', // the method that defines the relationship in your Model
            'entity' => 'suitabilities', // the method that defines the relationship in your Model
            'attribute' => 'label', // foreign key attribute that is shown to user
            'model' => "App\Models\Suitability", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            'tab' => 'Categorisation'
        ];

        // Columns

        $expiryColumnArray = [
            'name' => 'expiry',
            'label' => "Days remaining",
            'type' => 'closure',
            'function' => function($entry) {
                if($entry->expires_in()) {
                    return $entry->expires_in() . ' days' ;
                }
                else {
                    return 'Expired';
                }

            }
        ];

        // $organisationColumnArray = [
        //     'name' => 'organisation',
        //     'label' => "Organisation",
        //     'type' => 'closure',
        //     'function' => function($entry) {
        //         return $entry->organisation->name;
        //     }
        // ];

        $titleColumn = [
          'name' => 'title',
          'label' => 'Opportunity',
          'type' => 'closure',
          'function' => function($entry) {
            return '<strong>' . $entry->title . '</strong><div class="small text-muted">' . $entry->organisation->name . '</div>';
          }
        ];

        $this->crud->addFields([$titleArray, $introFieldArray, $descriptionArray, $expensesFieldArray, $placesArray, $statusHeading, $activeFieldArray, $renewFieldArray, $organisationFieldArray, $locationHeading, $addressFieldArray, $contactHeading, $emailFieldArray, $phoneFieldArray, $fromHomeFieldArray, $hoursHeading, $frequencyFieldArray, $hoursFieldArray, $dateHeading, $startDateFieldArray, $endDateFieldArray, $deadlineHeading, $deadlineFieldArray, $categoriesFieldArray, $skillsNeededFieldArray, $skillsGainedFieldArray, $requirementsFieldArray, $suitabilitiesFieldArray, $accessibilityFieldArray]);
        $this->crud->addColumns([$titleColumn, $expiryColumnArray]);

        $this->crud->addButtonFromView('line', 'renew', 'renew', 'beginning');
        $this->crud->addButtonFromView('line', 'view', 'view', 'beginning');

        // add asterisk for fields that are required in OpportunityRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        // if(isset($request['address']) && $request['address']) {
        //   $request['address_ward'] = $this->getWardData($request['address']);
        // }

        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        // if(isset($request['address']) && $request['address']) {
        //   $request['address_ward'] = $this->getWardData($request['address']);
        // }
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    // public function index()
    //   {
    //     $this->crud->addClause('active');
    //      return parent::index();
    //   }

    public function renew($id) {
        $opportunity = Opportunity::find($id);
        $opportunity->renew();
    }
}
