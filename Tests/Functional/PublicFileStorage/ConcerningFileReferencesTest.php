<?php
declare(strict_types=1);

namespace Pagemachine\FileVariants\Tests\Functional\PublicFileStorage;


use Pagemachine\FileVariants\Tests\Functional\ConcerningFileReferences;

/**
 * Class ConcerningFileReferencesTest
 */
class ConcerningFileReferencesTest extends ConcerningFileReferences
{

    /**
     * @var string
     */
    protected $scenarioDataSetDirectory = 'typo3conf/ext/file_variants/Tests/Functional/PublicFileStorage/DataSet/ConcerningFileReferences/Initial/';

    /**
     * @var string
     */
    protected $assertionDataSetDirectory = 'typo3conf/ext/file_variants/Tests/Functional/PublicFileStorage/DataSet/ConcerningFileReferences/AfterOperation/';
}
