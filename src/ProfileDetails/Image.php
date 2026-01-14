<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\ProfileDetails;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Image implements GroupNodeInterface{
    use GroupNodeTraits;

    public string $imageId;
    public string $imagePath;


    public function fetchDataFromGroupNode(GroupNode $imageGroupGroupNode): void
    {
        $imageNode = $imageGroupGroupNode->getSingleDescendantNodeByPath('image');
        $this->imageId = $imageNode->fileId ?? '';
        $this->imagePath = $imageNode->filePath ?? '';
    }
}
