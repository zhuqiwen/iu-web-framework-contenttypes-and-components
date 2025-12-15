<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Table;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Row implements GroupNodeInterface
{

    use GroupNodeTraits;
    public readonly array $cells;

    public function fetchDataFromGroupNode(GroupNode $rowGroupNode): void
    {
        $cellGroupNodes = $rowGroupNode->getAllDescendantNodesByPath('tcell');
        foreach ($cellGroupNodes as $cellGroupNode) {
            $this->cells[] = new Cell($cellGroupNode);
        }
    }
}
