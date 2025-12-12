<?php


namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Pages;

use Edu\IU\Framework\GenericUpdater\Asset\Foldered\Page;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\BannerInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Details;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Section;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\NodeInterface;
use Edu\IU\RSB\StructuredDataNodes\SystemDataStructureRoot;

class PageStandard{

    use PageTraits;

    public function __construct(Page $page)
    {

        $systemDataStructureRoot = new SystemDataStructureRoot($page->getOldStructuredDataNode());
        //metadata
        //path
        //name
        //parent folder path
        //social media
        //banner
        $this->banner = $this->constructBanner($systemDataStructureRoot->getSingleDescendantNodeByPath('banner'));
        //section
        $this->sections = $this->constructSections($systemDataStructureRoot->getAllDescendantNodesByPath('section'));

    }

    public function getSection(int $zeroBasedIndex): Section | null
    {
        $result = null;
        if ($zeroBasedIndex < sizeof($this->sections)) {
            $result = $this->sections[$zeroBasedIndex];
        }

        return $result;
    }

    protected function constructBanner(NodeInterface | GroupNode $bannerGroupNode): BannerInterface | null
    {
        $bannerType = $bannerGroupNode->getSingleDescendantNodeByPath('type')->text ?? '';
        $bannerType = preg_replace('/[^a-zA-Z]+/', '', $bannerType);
        $className = 'Edu\\IU\\RSB\\IUWebFrameworkContentTypesAndComponents\\Banners\\' . $bannerType;

        return empty($bannerType) ? null : new $className($bannerGroupNode);
    }




    protected function constructSections(array $sectionGroupNodesArray): array
    {
        $result = [];

        foreach($sectionGroupNodesArray as $sectionGroupNode){
            $result[] = new Section($sectionGroupNode);
        }

        return $result;
    }

}