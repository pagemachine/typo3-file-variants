<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Translatable files',
    'description' => 'Files can present their language variants and use them',
    'category' => 'extension',
    'author_company' => 'Pagemachine AG',
    'state' => 'stable',
    'version' => '0.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99'
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Pagemachine\\FileVariants\\' => 'Classes',
        ],
    ],
];
