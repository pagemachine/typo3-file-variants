<?php
declare(strict_types=1);

namespace Pagemachine\FileVariants\FormEngine\FieldWizard;

use TYPO3\CMS\Core\Database\Connection;
use Pagemachine\FileVariants\Service\ResourcesService;
use TYPO3\CMS\Backend\Form\AbstractNode;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Description
 */
class FileVariantsOverviewWizard extends AbstractNode
{

    /**
     * Handler for single nodes
     *
     * @return array As defined in initializeResultArray() of AbstractNode
     */
    public function render(): array
    {
        $result = $this->initializeResultArray();

        // no parent - we are in default language
        $parentField = (int)($this->data['databaseRow']['l10n_parent'][0] ?? 0);
        if ($parentField === 0) {
            $result['html'] .= '<div class="variants-preview">';
            $resourcesService = GeneralUtility::makeInstance(ResourcesService::class);
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_file_metadata');
            $translations = $queryBuilder->select('file', 'sys_language_uid')->from('sys_file_metadata')->where($queryBuilder->expr()->eq(
                'l10n_parent',
                $queryBuilder->createNamedParameter((int)$this->data['databaseRow']['uid'], Connection::PARAM_INT)
            ))->executeQuery();
            while ($translation = $translations->fetchAssociative()) {
                $siteLanguage = $this->findSiteLanguageById((int)$translation['sys_language_uid']);
                $result['html'] .= '<p class="t3-sysfile-translation">';
                $result['html'] .= '<span>' . $siteLanguage->getTitle() . '</span>';
                $result['html'] .= $resourcesService->generatePreviewImageHtml((int)$translation['file'], 't3-tceforms-sysfile-translation-imagepreview');
                $result['html'] .= '</p>';
            }
            $result['html'] .= '</div>';
        }

        $result['stylesheetFiles'][] = 'EXT:file_variants/Resources/Public/Css/FileVariantInfoElement.css';

        return $result;
    }

    private function findSiteLanguageById(int $siteLanguageId): SiteLanguage
    {
        foreach (GeneralUtility::makeInstance(SiteFinder::class)->getAllSites() as $site) {
            try {
                return $site->getLanguageById($siteLanguageId);
            } catch (\InvalidArgumentException) {
                continue;
            }
        }

        throw new \InvalidArgumentException(sprintf('No site language with ID "%d"', $siteLanguageId), 1711465624);
    }
}
