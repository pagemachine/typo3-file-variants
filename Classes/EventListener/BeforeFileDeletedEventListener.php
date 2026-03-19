<?php
declare(strict_types=1);

namespace Pagemachine\FileVariants\EventListener;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Resource\Event\BeforeFileDeletedEvent;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class BeforeFileDeletedEventListener
{
    public function __invoke(BeforeFileDeletedEvent $event): void
    {
        $file = $event->getFile();

        if ($file instanceof File) {
            $fileUid = $file->getUid();
            /** @var QueryBuilder $queryBuilder */
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_file');
            $parentFileUid = (int)$queryBuilder->select('l10n_parent')->from('sys_file')->where($queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($fileUid, Connection::PARAM_INT)))->executeQuery()->fetchOne();

            /** @var QueryBuilder $queryBuilder */
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_file_reference');
            $references = $queryBuilder->select('uid')->from('sys_file_reference')->where($queryBuilder->expr()->eq('uid_local', $queryBuilder->createNamedParameter($fileUid, Connection::PARAM_INT)))->executeQuery();
            foreach ($references->fetchFirstColumn() as $referenceUid) {
                /** @var QueryBuilder $queryBuilder */
                $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_file_reference');
                $queryBuilder->update('sys_file_reference')->set('uid_local', $parentFileUid)->where($queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($referenceUid, Connection::PARAM_INT)))->executeStatement();
            }
        }
    }
}
