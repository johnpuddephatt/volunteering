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
        $this->addCustomField('address', 'App\Forms\Fields\Address');

        $this
            ->add('name', 'text', [
              'label' => 'Organisation name'
            ])
            ->add('address', 'address', [
                'country' => '["uk"]',
                'radius' => 5000,
                'location' => '53.6772339,-1.4042975'
            ])
            ->add('contact_name', 'text', [
              'wrapper' => ['class' => 'form-group__half-width'],
              'help_block' => [
                'text' => 'Your name',
               ],
            ])
            ->add('email', 'email', [
              'label' => 'Contact email',
              'value' => $_REQUEST['email'] ?? null,
              'wrapper' => ['class' => 'form-group__half-width'],
              'help_block' => [
                'text' => 'You’ll use this email address to sign in to the site',
               ]
            ])
            ->add('password', 'password', [
              'value' => $_REQUEST['password'] ?? null,
              'wrapper' => ['class' => 'form-group__half-width'],
            ])
            ->add('contact_role', 'text', [
              'wrapper' => ['class' => 'form-group__half-width'],
              'help_block' => [
                'text' => 'Your job title.',
               ],
            ])
            ->add('phone', 'text', [
              'wrapper' => ['class' => 'form-group__half-width'],
              'help_block' => [
                'text' => 'Optional. Displayed on listings if provided.',
               ],
            ])
            ->add('website', 'text', [
              'wrapper' => ['class' => 'form-group__half-width'],
            ])
            ->add('info', 'textarea', [
              'attr' => [
                'rows' => '5',
                'maxlength' => '300'
              ],
              'help_block' => [
                'text' => 'Provide a sentence or two that sums up the work of your organisation',
               ],
            ])
            ->add('logo', 'logo')
            ->add('submit', 'submit', [
              'attr' => ['class' => 'button__block'],
              'label' => \Auth::id() ? 'Update' : 'Register'
            ]);
    }
}
