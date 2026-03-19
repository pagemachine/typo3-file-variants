<?php
declare(strict_types=1);

/*
 * This file is part of the package t3g/file_variants.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Pagemachine\FileVariants\Tests\Functional\PrivateFileStorage;


use Pagemachine\FileVariants\Tests\Functional\ConcerningFileReferences;

/**
 * Class ConcerningFileReferencesTest
 */
class ConcerningFileReferencesTest extends ConcerningFileReferences
{

    /**
     * @var string
     */
    protected $scenarioDataSetDirectory = 'typo3conf/ext/file_variants/Tests/Functional/PrivateFileStorage/DataSet/ConcerningFileReferences/Initial/';

    /**
     * @var string
     */
    protected $assertionDataSetDirectory = 'typo3conf/ext/file_variants/Tests/Functional/PrivateFileStorage/DataSet/ConcerningFileReferences/AfterOperation/';
}
