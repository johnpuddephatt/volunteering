<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class OpportunityCreationForm extends Form
{
    public function __construct()
    {
    }

    public function buildForm()
    {
        $this->addCustomField('quill', 'App\Forms\Fields\Quill');
        $this->addCustomField('address', 'App\Forms\Fields\Address');

        $this
            ->add('title', 'text')
            ->add('description', 'quill', [
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'quill-text-area-' . $this->name
                ],
                'toolbar' => "[{ header: [1, 2, false] }],['bold', 'italic'],['link'],[{ list: 'ordered' }, { list: 'bullet' }]"
            ])
            ->add('places', 'number')
            ->add('address', 'address', [
                'country' => '["uk"]',
                'radius' => 5000,
                'location' => '53.6772339,-1.4042975'
            ])
            ->add('minimum_age', 'number')
            ->add('expenses', 'textarea')
            ->add('from_home', 'checkbox', [
                'checked' => false
            ])
            ->add('phone', 'text')
            ->add('email', 'text')
            ->add('frequency', 'select', [
                'choices' => ['one-off' => 'One-off', 'Fixed period' => 'Fixed period', 'Ongoing' => 'Ongoing']
            ])
            ->add('hours', 'number')
            ->add('start_date', 'date')
            ->add('end_date', 'date')
            ->add('requirements', 'choice', [
                'choices' => array_combine(config('volunteering.requirements'),config('volunteering.requirements')),
                'expanded' => false,
                'multiple' => true
            ])
            ->add('skills_needed', 'choice', [
                'choices' => array_combine(config('volunteering.skills'),config('volunteering.skills')),
                'expanded' => false,
                'multiple' => true
            ])
            ->add('skills_gained', 'choice', [
                'choices' => array_combine(config('volunteering.skills'),config('volunteering.skills')),
                'expanded' => false,
                'multiple' => true
            ])
            ->add('categories', 'entity', [
                'class' => 'App\Models\Category',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true
             ])
            ->add('suitabilities', 'entity', [
                'class' => 'App\Models\Suitability',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true
            ])
            ->add('accessibilities', 'entity', [
                'class' => 'App\Models\Accessibility',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true
            ])
            ->add('submit', 'submit', ['label' => 'Submit']);
    }
}
