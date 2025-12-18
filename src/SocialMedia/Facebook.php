<?php
namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\SocialMedia;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Facebook implements GroupNodeInterface
{
    use GroupNodeTraits;

    public readonly string $title;
    public readonly string $description;
    public readonly string $imageId;
    public readonly string $imagePath;



    public function fetchDataFromGroupNode(GroupNode $facebookGroupNode): void
    {
        $this->title = $facebookGroupNode->getSingleDescendantNodeByPath('title')->text ?? '';
        $this->description = $facebookGroupNode->getSingleDescendantNodeByPath('description')->text ?? '';
        $image = $facebookGroupNode->getSingleDescendantNodeByPath('image');
        $this->imageId = $image->fileId ?? '';
        $this->imagePath = $image->filePath ?? '';

    }
}