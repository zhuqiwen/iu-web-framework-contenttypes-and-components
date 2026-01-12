<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\Text;


use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Background implements GroupNodeInterface{
    use GroupNodeTraits;

    public readonly string $color;

    public function fetchDataFromGroupNode(GroupNode $backgroundGroupNode): void
    {

        $this->color = $backgroundGroupNode->getSingleDescendantNodeByPath('bg-color')->text ?? '';
    }


}