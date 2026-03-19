<?php
declare(strict_types=1);

namespace Pagemachine\FileVariants\Tests\Functional\PublicFileStorage;


use Pagemachine\FileVariants\Tests\Functional\ConcerningMetadata;

/**
 * Class ConcerningMetadataTest
 */
class ConcerningMetadataTest extends ConcerningMetadata
{
    /**
     * @var string
     */
    protected $scenarioDataSetDirectory = 'typo3conf/ext/file_variants/Tests/Functional/PublicFileStorage/DataSet/ConcerningMetadata/Initial/';

    /**
     * @var string
     */
    protected $assertionDataSetDirectory = 'typo3conf/ext/file_variants/Tests/Functional/PublicFileStorage/DataSet/ConcerningMetadata/AfterOperation/';
}
