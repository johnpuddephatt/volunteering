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
            ->add('title', 'text', [
              'attr' => [
                'class' => 'input__large'
              ]
            ])
            ->add('intro', 'textarea', [
              'attr' => ['rows' => '5'],
            ])
            ->add('description', 'quill', [
                'attr' => [
                    'class' => 'form-group',
                    'id' => 'quill-text-area-' . $this->name
                ],
                'toolbar' => "[{ header: [1, 2, false] }],['bold', 'italic'],['link'],[{ list: 'ordered' }, { list: 'bullet' }]"
            ])
            ->add('places', 'number', [
              'wrapper' => ['class' => 'form-group__half-width'],
            ])
            ->add('address', 'address', [
                'country' => '["uk"]',
                'radius' => 5000,
                'location' => '53.6772339,-1.4042975'
            ])
            ->add('minimum_age', 'number', [
              'wrapper' => ['class' => 'form-group__half-width'],
            ])
            ->add('expenses', 'textarea', [
            'attr' => ['rows' => '5'],
            'help_block' => [
              'text' => 'Provide information about what expenses you will cover.',
             ],
            ])
            ->add('from_home', 'checkbox', [
                'checked' => false
            ])
            ->add('phone', 'text')
            ->add('email', 'text')

            ->add('frequency', 'select', [
                'choices' => ['one-off' => 'One-off', 'Fixed period' => 'Fixed period', 'Ongoing' => 'Ongoing']
            ])
            ->add('start_date', 'date', [
              'wrapper' => ['class' => 'form-group__half-width'],
            ])
            ->add('end_date', 'date', [
              'wrapper' => ['class' => 'form-group__half-width'],
            ])
            ->add('hours', 'number')

            ->add('requirements', 'choice', [
                'choices' => array_combine(config('volunteering.requirements'),config('volunteering.requirements')),
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-amendable'
                ]
            ])
            ->add('skills_needed', 'choice', [
                'choices' => array_combine(config('volunteering.skills'),config('volunteering.skills')),
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-amendable'
                ]
            ])
            ->add('skills_gained', 'choice', [
                'choices' => array_combine(config('volunteering.skills'),config('volunteering.skills')),
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-amendable'
                ]
            ])
            ->add('categories', 'entity', [
                'class' => 'App\Models\Category',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-fixed'
                ]
             ])
            ->add('suitabilities', 'entity', [
                'class' => 'App\Models\Suitability',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-fixed'
                ]
            ])
            ->add('accessibilities', 'entity', [
                'class' => 'App\Models\Accessibility',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-fixed'
                ]
            ])
            ->add('submit', 'submit', [
              'attr' => ['class' => 'button__block'],
              'label' => 'Submit'
            ]);
    }
}
