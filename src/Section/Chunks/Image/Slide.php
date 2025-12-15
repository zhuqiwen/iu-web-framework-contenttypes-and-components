<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Image;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\ChunkInterface;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Slide implements GroupNodeInterface {

    use GroupNodeTraits;
    public readonly string $caption;
    public readonly string $attribution;
    public readonly string $imageId;
    public readonly string $imagePath;

    public function fetchDataFromGroupNode(GroupNode $slideGroupNode):void
    {
        $this->caption = $slideGroupNode->getSingleDescendantNodeByPath('caption')->text ?? '';
        $this->attribution = $slideGroupNode->getSingleDescendantNodeByPath('attribution')->text ?? '';
        $this->imageId = $slideGroupNode->getSingleDescendantNodeByPath('image')->fileId ?? '';
        $this->imagePath = $slideGroupNode->getSingleDescendantNodeByPath('image')->filePath ?? '';
    }

}