<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\Text\Background;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class TextImage extends TextOverlay{

    public readonly Background $background;

    public function fetchDataFromGroupNode(GroupNode $bannerGroupNode):void
    {
        parent::fetchDataFromGroupNode($bannerGroupNode);
        $this->background = new Background($bannerGroupNode->getSingleDescendantNodeByPath('background'));
    }
}
