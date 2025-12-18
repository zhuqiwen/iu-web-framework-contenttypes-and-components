<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Table;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Body implements GroupNodeInterface
{

    use GroupNodeTraits;

    public  array $rows;

    public function fetchDataFromGroupNode(GroupNode $bodyGroupNode): void
    {
        $rowGroupNodes = $bodyGroupNode->getAllDescendantNodesByPath('table-row');
        foreach ($rowGroupNodes as $rowGroupNode) {
            $this->rows[] = new Row($rowGroupNode);
        }
    }
}
