<?php

return [
    'admin_email' => env('ADMIN_EMAIL', 'info@volunteerwakefield.org'),
    'opportunities_per_page' => 6,
    'opportunity_valid_for' => 90,
    'max_distance' => 10,
    'max_days_for_new' => 7,
    'skills' => [
        'Creative',
        'Catering',
        'Decorating & carpentry',
        'Design',
        'IT / Computers',
        'Leadership',
        'Listening',
        'Maths/Numeracy',
        'Organising',
        'Photography',
        'Reading & writing',
        'Talking to others',
        'Teamwork'
    ],

    'requirements' => [
        'Criminal record check (DBS)',
        'Full driving license',
        'Live locally',
        'Own computer (or access to one)',
        'References'
    ]
];
