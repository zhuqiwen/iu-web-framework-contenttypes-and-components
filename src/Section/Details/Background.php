<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Details;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Background implements GroupNodeInterface {

    use GroupNodeTraits;
    public string $color;
    public string $imageId;
    public string $imagePath;
    public string $parallax;


    public function fetchDataFromGroupNode(GroupNode $backgroundGroupNode):void
    {
        $this->color = $backgroundGroupNode->getSingleDescendantNodeByPath('bg-color')->text ?? '';
        $this->imageId = $backgroundGroupNode->getSingleDescendantNodeByPath('bg-image')->fileId ?? '';
        $this->imagePath = $backgroundGroupNode->getSingleDescendantNodeByPath('bg-image')->filePath ?? '';;
        $this->parallax = $backgroundGroupNode->getSingleDescendantNodeByPath('parallax')->text ?? '';;
    }

}
