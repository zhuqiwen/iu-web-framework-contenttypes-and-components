<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Table;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Header implements GroupNodeInterface
{

    use GroupNodeTraits;

    public  array $headerCells;


    public function fetchDataFromGroupNode(GroupNode $headerGroupNode): void
    {
        $headerCellNodes = $headerGroupNode->getAllDescendantNodesByPath('header-cell');

        foreach ($headerCellNodes as $headerCellNode) {
            $this->headerCells[] = $headerCellNode->text ?? '';
        }
    }
}
