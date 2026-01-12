<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\Text\Background;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class TextOverlay implements GroupNodeInterface, BannerInterface{
    use GroupNodeTraits;
    use BannerTraits;

    public readonly string $imageId;
    public readonly string $imagePath;
    public readonly string $tabletImageId;
    public readonly string $tabletImagePath;
    public readonly string $mobileImageId;
    public readonly string $mobileImagePath;
    public readonly string $contentPosition;
    public readonly string $header;
    public readonly string $subhead;
    public readonly string $linkLabel;
    public readonly string $internalLinkId;
    public readonly string $internalLinkPath;
    public readonly string $internalLinkType;
    public readonly string $externalLink;


    public function fetchDataFromGroupNode(GroupNode $bannerGroupNode):void
    {
        $image = $bannerGroupNode->getSingleDescendantNodeByPath('image');
        $tabletImage = $bannerGroupNode->getSingleDescendantNodeByPath('tablet-image');
        $mobileImage = $bannerGroupNode->getSingleDescendantNodeByPath('mobile-image');

        $this->imageId = $image->fileId ?? '';
        $this->imagePath = $image->filePath ?? '';
        $this->tabletImageId = $tabletImage->fileId ?? '';
        $this->tabletImagePath = $tabletImage->filePath ?? '';
        $this->mobileImageId = $mobileImage->fileId ?? '';
        $this->mobileImagePath = $mobileImage->filePath ?? '';

        $this->contentPosition = $bannerGroupNode->getSingleDescendantNodeByPath('content-position')->text ?? '';
        $this->header = $bannerGroupNode->getSingleDescendantNodeByPath('header')->text ?? '';
        $this->subhead = $bannerGroupNode->getSingleDescendantNodeByPath('subhead')->text ?? '';
//        $this->linkLabel = $bannerGroupNode->getSingleDescendantNodeByPath('link-label')->text ?? '';


        $this->fetchDataLinkInfo($bannerGroupNode);
    }
}
