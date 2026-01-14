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


    protected function init(Page $page): void
    {
        $this->readFromPage($page);
    }

    /**
     * READ
     */

    /**
     * @param int $zeroBasedIndex
     * @return Section|null
     */





    /**
     * END of READ
     */

    /**
     * CREATE with new data
     */
}