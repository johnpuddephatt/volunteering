<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class NeedCreationForm extends Form
{
    public function __construct()
    {

    }

    public function buildForm()
    {
        $this
          ->add('title', 'text', [
            'attr' => [
              'class' => 'input__large'
            ],
            'help_block' => [
              'text' => 'Sum up what’s needed. Giving each of your needs a single focus increases your chances of finding people able to help with it.',
             ],
          ])
          ->add('description', 'textarea', [
            'attr' => [
              'rows' => '5',
              'maxlength' => '180'
            ],
            'help_block' => [
              'text' => 'Give a short explanation of what helping with this will involve, including a rough idea of the time commitment (e.g. a couple of hours per day) and if there are any specific requirements (e.g. you’ll need a car)',
             ],
          ])
          ->add('contact_email', 'text', [
            'help_block' => [
              'text' => 'Optionally provide an email address to be displayed publicly. If ommitted your email will not be public and enquiries will be sent through to the email used to register this account.',
             ],
          ])
          ->add('contact_phone', 'text', [
            'help_block' => [
              'text' => 'Optionally provide a contact phone number to appear on this listing.',
             ],
          ])
          ->add('accepts_enquiries', 'checkbox', [
            'value' => 1,
            'checked' => true,
            'help_block' => [
              'text' => 'Choose whether to accept enquiries through the online form.',
             ],
          ])
          ->add('submit', 'submit', [
            'attr' => ['class' => 'button__block'],
            'label' => 'Submit'
          ]);
    }
}
