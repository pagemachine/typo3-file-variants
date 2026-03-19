<?php

defined('TYPO3') or die();

call_user_func(function () {
    $GLOBALS['TCA']['sys_file_metadata']['ctrl']['container'] = [
    'outerWrapContainer' => [
        'fieldWizard' => [
            'FileVariantsOverviewWizard' => [
                'renderType' => 'FileVariantsOverviewWizard',
            ],
        ],
    ],
];
});
