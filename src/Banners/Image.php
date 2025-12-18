<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Image implements GroupNodeInterface, BannerInterface{
    use GroupNodeTraits;
    use BannerTraits;

    public readonly string $imageId;
    public readonly string $imagePath;
    public readonly string $tabletImageId;
    public readonly string $tabletImagePath;
    public readonly string $mobileImageId;
    public readonly string $mobileImagePath;


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
    }
}
