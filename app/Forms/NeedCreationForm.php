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
          ->add('submit', 'submit', [
            'attr' => ['class' => 'button__block'],
            'label' => 'Submit'
          ]);
    }
}
