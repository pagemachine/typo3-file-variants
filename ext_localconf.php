<?php

use Pagemachine\FileVariants\DataHandler\DataHandlerHook;
use Pagemachine\FileVariants\FormEngine\FileVariantInfoElement;
use Pagemachine\FileVariants\FormEngine\FieldWizard\FileVariantsOverviewWizard;

if (!defined('TYPO3')) {
    die('Access denied!');
}

// NEVER! use namespaces or use statements in this file!

call_user_func(function () {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['file_variants'] = DataHandlerHook::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['file_variants'] = DataHandlerHook::class;

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1489747688] = [
        'nodeName' => 'fileInfo',
        'priority' => 30,
        'class' => FileVariantInfoElement::class,
    ];
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1494415118] = [
        'nodeName' => 'FileVariantsOverviewWizard',
        'priority' => 40,
        'class' => FileVariantsOverviewWizard::class,
    ];
});
