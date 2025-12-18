<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\Text\Background;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Text implements GroupNodeInterface, BannerInterface{
    use GroupNodeTraits;
    use BannerTraits;

    public readonly string $header;
    public readonly string $subhead;
    public readonly string $linkLabel;
    public readonly string $internalLinkId;
    public readonly string $internalLinkPath;
    public readonly string $internalLinkType;
    public readonly string $externalLink;

    public readonly Background $background;


    public function fetchDataFromGroupNode(GroupNode $bannerGroupNode): void
    {
        $this->header = $bannerGroupNode->getSingleDescendantNodeByPath('header')->text ?? '';
        $this->subhead = $bannerGroupNode->getSingleDescendantNodeByPath('subhead');
        $this->linkLabel = $bannerGroupNode->getSingleDescendantNodeByPath('link-label');

        $this->background = new Background($bannerGroupNode->getSingleDescendantNodeByPath('background'));

        $this->fetchDataLinkInfo($bannerGroupNode);
    }
}
