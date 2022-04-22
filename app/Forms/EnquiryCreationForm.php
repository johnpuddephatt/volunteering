<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class EnquiryCreationForm extends Form
{
    public function __construct()
    {
    }

    public function buildForm()
    {
        if($this->getData('enquirable_type')) {
          $type = explode('\\', $this->getData('enquirable_type'));
        }

        $this->add('enquirable_id', 'entity', [
            'label' => isset($type) ? end($type) : 'Opportunity',
            'class' => $this->getData('enquirable_type') ? $this->getData('enquirable_type') : 'App\Models\Opportunity',
            'property' => 'title',
            'expanded' => false,
            'multiple' => false,
            'selected' => $this->getData('enquirable_id') ?? '1',
            'wrapper' => ['class' => $this->getData('enquirable_id') ? 'form-group__hidden' : ''],
        ]);

        $this->add('enquirable_type', 'text', [
            'label' => 'Enquirable type',
            'value' => $this->getData('enquirable_type'),
            'wrapper' => ['class' => 'form-group__hidden'],
        ]);


        $this
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('website', 'text', [
              'wrapper' => ['class' => 'form-group__website']
            ])
            ->add('phone', 'text')
            ->add('message', 'textarea', [
              'attr' => ['rows' => '5'],
            ])
            ->add('submit', 'submit', [
              'attr' => ['class' => 'button__block'],
              'label' => 'Submit'
            ]);

    }
}
