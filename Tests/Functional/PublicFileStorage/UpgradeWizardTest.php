<?php

namespace Pagemachine\FileVariants\Tests\Functional\PublicFileStorage;

use PHPUnit\Framework\Attributes\Test;
use Pagemachine\FileVariants\Tests\Functional\FunctionalTestCase;
use Pagemachine\FileVariants\Updates\MetaDataRecordsUpdateWizard;
use TYPO3\CMS\Core\Core\Environment;

/**
 * Class UpgradeWizardTest
 */
class UpgradeWizardTest extends FunctionalTestCase
{

    /**
     * @var string
     */
    protected $scenarioDataSetDirectory = 'typo3conf/ext/file_variants/Tests/Functional/PublicFileStorage/DataSet/UpgradeWizard/Initial/';

    /**
     * @var string
     */
    protected $assertionDataSetDirectory = 'typo3conf/ext/file_variants/Tests/Functional/PublicFileStorage/DataSet/UpgradeWizard/AfterOperation/';

    #[Test]
    public function runWizard()
    {
        $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['file_variants'] = ['variantsStorageUid' => 5, 'variantsFolder' => 'languageVariants'];
        $scenarioName = 'UpgradeWizard';
        $this->importCsvScenario($scenarioName);
        $this->setUpFrontendRootPage(1);

        copy(Environment::getPublicPath() . '/typo3conf/ext/file_variants/Tests/Functional/Fixture/TestFiles/cat_1.jpg', Environment::getPublicPath() . '/fileadmin/cat_1.jpg');

        $subject = new MetaDataRecordsUpdateWizard();
        $subject->executeUpdate();

        $this->importAssertCSVScenario($scenarioName);
    }
}
