<?php


namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Pages;

use Edu\IU\Framework\GenericUpdater\Asset\Foldered\Page;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\BannerInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Details;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Section;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\SocialMedia\SocialMedia;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\NodeInterface;
use Edu\IU\RSB\StructuredDataNodes\SystemDataStructureRoot;

class PageStandard implements PageInterface{

    use PageTraits;
    public readonly SocialMedia $socialMedia;

    public function __construct(?Page $page = null)
    {
        //read
        if ($page) {
            $this->readFromPage($page);
        }

    }

    /**
     * READ
     */

    /**
     * @param int $zeroBasedIndex
     * @return Section|null
     */
    public function getSection(int $zeroBasedIndex): Section | null
    {
        $result = null;
        if ($zeroBasedIndex < sizeof($this->sections)) {
            $result = $this->sections[$zeroBasedIndex];
        }

        return $result;
    }



    protected function readFromPage(Page $page): void
    {
        $systemDataStructureRoot = new SystemDataStructureRoot($page->getOldStructuredDataNode());
        $assetData = $page->getOldAsset();
        //metadata
        $this->metadata = $assetData->metadata;
        //path
        $this->path = $assetData->path ?? '';
        //name
        $this->name = $assetData->name ?? '';
        $this->id = $assetData->id ?? '';
        //parent folder path
        $this->parentFolderId = $assetData->parentFolderId ?? '';
        $this->parentFolderPath = $assetData->parentFolderPath ?? '';
        $this->contentTypeId = $assetData->contentTypeId ?? '';
        $this->contentTypePath = $assetData->contentTypePath ?? '';
        //social media
        $this->socialMedia = new SocialMedia($systemDataStructureRoot->getSingleDescendantNodeByPath('social-media-meta'));
        //banner
        $this->banner = $this->fetchBanner($systemDataStructureRoot->getSingleDescendantNodeByPath('banner'));
        //section
        $this->sections = $this->fetchSections($systemDataStructureRoot->getAllDescendantNodesByPath('section'));
    }
    protected function fetchBanner(NodeInterface | GroupNode $bannerGroupNode): BannerInterface | null
    {
        $bannerType = $bannerGroupNode->getSingleDescendantNodeByPath('type')->text ?? '';
        $bannerType = preg_replace('/[^a-zA-Z]+/', '', $bannerType);
        $className = 'Edu\\IU\\RSB\\IUWebFrameworkContentTypesAndComponents\\Banners\\' . $bannerType;

        return empty($bannerType) ? null : new $className($bannerGroupNode);
    }




    protected function fetchSections(array $sectionGroupNodesArray): array
    {
        $result = [];

        foreach($sectionGroupNodesArray as $sectionGroupNode){
            $result[] = new Section($sectionGroupNode);
        }

        return $result;
    }


    /**
     * END of READ
     */

    /**
     * CREATE with new data
     */
}