<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class OrganisationRegistrationForm extends Form
{
    public function __construct()
    {
    }

    public function buildForm()
    {
        $this->addCustomField('logo', 'App\Forms\Fields\Logo');

        $this
            ->add('heading', 'static', [
              'tag' => 'h2', // Tag to be used for holding static data,
              'attr' => ['class' => 'form-heading'], // This is the default
              'value' => 'Register your organisation', // If nothing is passed, data is pulled from model if any
              'label_show' => false
            ])
            ->add('name', 'text', [
              'label' => 'Organisation name'
            ])
            ->add('contact_name', 'text')
            ->add('email', 'email', [
              'label' => 'Contact email'
            ])
            ->add('password', 'password')
            ->add('contact_role', 'text')
            ->add('phone', 'text')
            ->add('website', 'text')
            ->add('info', 'textarea')
            ->add('logo', 'logo')
            ->add('submit', 'submit', ['label' => 'Register']);
    }
}
