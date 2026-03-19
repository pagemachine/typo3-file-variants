<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
    ->setRules([
        'general_phpdoc_annotation_remove' => [
            'annotations' => [
                'author',
            ]
        ],
    ])
;
$config
    ->getFinder()
        ->in(dirname(__DIR__))
        ->exclude([
            basename(__DIR__) . '/Web',
        ])
    ;

return $config;
