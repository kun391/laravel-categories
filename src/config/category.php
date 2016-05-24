<?php

/*
 * If you want to add more fields to the table, You can add config custom_fields
 * Ex: 'custom_fields' => [
 *          'field_a' => 'type_a',
 *          'field_b' => 'type_b'
 *     ]
 *
 */

return [
    'custom_fields' => [],
    'providers' => [
        'Collective\Html\HtmlServiceProvider'
    ],
    'aliases' => [
        'form' => [
            'alias_name' => 'Form',
            'alias' => 'Collective\Html\FormFacade'
        ],
        'html' => [
            'alias_name' => 'Html',
            'alias' => 'Collective\Html\HtmlFacade'
        ],
    ]
];
