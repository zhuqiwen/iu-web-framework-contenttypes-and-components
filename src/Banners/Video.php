<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\Text\Background;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Video implements GroupNodeInterface, BannerInterface
{
    use GroupNodeTraits;
    use BannerTraits;

    public readonly string $mp4Id;
    public readonly string $mp4Path;
    public readonly string $webmId;
    public readonly string $webmPath;
    public readonly string $fallbackImageId;
    public readonly string $fallbackImagePath;
    public readonly string $mobileImageId;
    public readonly string $mobileImagePath;
    public readonly string $transcript;


    public function fetchDataFromGroupNode(GroupNode $bannerGroupNode): void
    {
        $mp4 = $bannerGroupNode->getSingleDescendantNodeByPath('mp4');
        $webm = $bannerGroupNode->getSingleDescendantNodeByPath('webm');
        $fallbackImage = $bannerGroupNode->getSingleDescendantNodeByPath('fallback-image');
        $mobileImage = $bannerGroupNode->getSingleDescendantNodeByPath('mobile-image');
        $this->mp4Id = $mp4->fileId ?? '';
        $this->mp4Path = $mp4->filePath ?? '';
        $this->webmId = $webm->fileId ?? '';
        $this->webmPath = $webm->filePath ?? '';
        $this->fallbackImageId = $fallbackImage->fileId ?? '';
        $this->fallbackImagePath = $fallbackImage->filePath ?? '';
        $this->mobileImageId = $mobileImage->fileId ?? '';
        $this->mobileImagePath = $mobileImage->filePath ?? '';

        $this->transcript = $bannerGroupNode->getSingleDescendantNodeByPath('transcript')->text ?? '';
    }
}