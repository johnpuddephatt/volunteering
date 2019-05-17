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


        $this->add('opportunity_id', 'entity', [
            'class' => 'App\Models\Opportunity',
            'property' => 'title',
            'expanded' => false,
            'multiple' => false,
            'selected' => $this->getData('opportunity_id') ?? '',
            'wrapper' => ['class' => $this->getData('opportunity_id') ? 'form-group__hidden' : ''],
         ]);



        $this
            ->add('name', 'text')
            ->add('email', 'text')
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
