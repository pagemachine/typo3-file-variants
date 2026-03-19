<?php
declare(strict_types=1);

namespace Pagemachine\FileVariants\Tests\Functional\DataHandling;

use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\TestingFramework\Core\Functional\Framework\DataHandling\ActionService;

final class PermissiveActionService extends ActionService
{
    protected function createDataHandler(): DataHandler
    {
        $dataHandler = parent::createDataHandler();
        $dataHandler->bypassAccessCheckForRecords = true;

        return $dataHandler;
    }
}
