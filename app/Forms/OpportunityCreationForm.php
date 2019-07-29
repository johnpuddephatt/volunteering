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
              ],
              'help_block' => [
                'text' => 'Sum up the role. Don’t include your organisation’s name.',
               ],
            ])
            ->add('intro', 'textarea', [
              'attr' => [
                'rows' => '5',
                'maxlength' => '100'
              ],
              'help_block' => [
                'text' => 'A short line to catch people’s eye and make your opportunity sound appealing. Try starting with “We’re looking for someone...” or “Could you help...”',
               ],
            ])
            ->add('description', 'quill', [
                'attr' => [
                    'class' => 'form-group',
                    'id' => 'quill-text-area-' . $this->name,
                ],
                'limit' => 1200,
                'help_block' => [
                  'text' => 'Explain role responsibilities and the difference it will make.',
                 ],
                'toolbar' => "[{ header: [2, 3, false] }],['bold', 'italic'],['link'],[{ list: 'ordered' }, { list: 'bullet' }]",

            ])
            ->add('places', 'number', [
              'wrapper' => ['class' => 'form-group__half-width'],
              'help_block' => [
                'text' => 'The number of volunteers you’re looking for.'
               ],
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
            ->add('from_home', 'checkbox')
            ->add('phone', 'text', [
              'help_block' => [
                'text' => 'Displayed publicly on the listing if provided.',
               ],
            ])
            ->add('email', 'text', [
              'help_block' => [
                'text' => 'Displayed publicly on the listing if provided.',
               ],
            ])

            ->add('frequency', 'select', [
                'choices' => ['one-off' => 'One-off', 'Fixed period' => 'Fixed period', 'Ongoing' => 'Ongoing']
            ])
            ->add('start_date', 'date', [
              'attr' => [
                'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2}',
                'placeholder' => 'YYYY-MM-DD'
              ],
              'wrapper' => ['class' => 'form-group__half-width'],
              'help_block' => [
                'text' => 'Optional, but must be a valid date if provided.',
              ]
            ])
            ->add('end_date', 'date', [
              'attr' => [
                'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2}',
                'placeholder' => 'YYYY-MM-DD'
              ],
              'wrapper' => ['class' => 'form-group__half-width'],
              'help_block' => [
                'text' => 'Optional, but must be a valid date if provided.',
              ]
            ])
            ->add('deadline', 'date', [
              'help_block' => [
                'text' => 'Opportunities will expire after ' . config('volunteering.opportunity_valid_for') . ' days, or on the deadline you provide, whichever is sooner. You can renew your opportunity at any time.',
               ],
            ])
            ->add('hours', 'number', [
              'help_block' => [
                'text' => 'An estimate of the number of hours per week. Will state ‘flexible’ if left blank.',
              ]
            ])

            ->add('requirements', 'choice', [
                'choices' => array_combine(config('volunteering.requirements'),config('volunteering.requirements')),
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-amendable'
                ],
                'help_block' => [
                  'text' => 'Choose from the list or add your own, pressing enter to add it to the list.'
                ]
            ])
            ->add('skills_needed', 'choice', [
                'choices' => array_combine(config('volunteering.skills'),config('volunteering.skills')),
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-amendable'
                ],
                'help_block' => [
                  'text' => 'Choose from the list or add your own, pressing enter to add it to the list.'
                ]
            ])
            ->add('skills_gained', 'choice', [
                'choices' => array_combine(config('volunteering.skills'),config('volunteering.skills')),
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-amendable'
                ],
                'help_block' => [
                  'text' => 'Choose from the list or add your own, pressing enter to add it to the list.'
                ]
            ])
            ->add('categories', 'entity', [
                'class' => 'App\Models\Category',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-fixed'
                ],
                'help_block' => [
                  'text' => 'Choose at least one category.',
                 ],
             ])
            ->add('suitabilities', 'entity', [
                'class' => 'App\Models\Suitability',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'choices-input-fixed'
                ],
                'help_block' => [
                  'text' => 'Choose from the list.'
                ]
            ])
            ->add('accessibilities', 'entity', [
                'class' => 'App\Models\Accessibility',
                'property' => 'label',
                'expanded' => false,
                'multiple' => true,
                'label' => 'Accessibility features',
                'attr' => [
                    'class' => 'choices-input-fixed'
                ],
                'help_block' => [
                  'text' => 'Choose from the list.'
                ]
            ])
            ->add('submit', 'submit', [
              'attr' => ['class' => 'button__block'],
              'label' => 'Submit'
            ]);
    }
}
