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
            ->add('name', 'text', [
              'label' => 'Organisation name'
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
                'maxlength' => '100'
              ],
              'help_block' => [
                'text' => 'Provide a sentence or two that sums up the work of your organisation',
               ],
            ])
            ->add('logo', 'logo')
            ->add('submit', 'submit', [
              'attr' => ['class' => 'button__block'],
              'label' => 'Register'
            ]);
    }
}
