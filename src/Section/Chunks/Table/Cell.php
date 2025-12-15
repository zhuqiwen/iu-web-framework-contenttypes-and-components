<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Table;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Cell implements GroupNodeInterface
{

    use GroupNodeTraits;

    public readonly string $type;
    public readonly string $content;


    public function fetchDataFromGroupNode(GroupNode $rowGroupNode): void
    {
        $this->type = $rowGroupNode->getSingleDescendantNodeByPath('type')->text;

        $this->content = match ($this->type) {
            'Standard' => $rowGroupNode->getSingleDescendantNodeByPath('tcell-standard')->text ?? '',
            'Advanced' => $rowGroupNode->getSingleDescendantNodeByPath('tcell-advanced')->text ?? '',
        };
    }
}
