<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Image implements GroupNodeInterface, BannerInterface{
    use GroupNodeTraits;
    use BannerTraits;

    public function fetchDataFromGroupNode(GroupNode $bannerGroupNode):void
    {
        // TODO: Implement fetchDataFromBannerGroupNode() method.
    }
}
