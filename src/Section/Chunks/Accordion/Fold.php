<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Accordion;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\ChunkInterface;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Fold implements GroupNodeInterface {

    use GroupNodeTraits;
    public readonly string $label;
    public readonly string $content;

    public function fetchDataFromGroupNode(GroupNode $foldGroupNode):void
    {
        $this->label = $foldGroupNode->getSingleDescendantNodeByPath('label')->text ?? '';
        $this->content = $foldGroupNode->getSingleDescendantNodeByPath('content')->text ?? '';
    }

}