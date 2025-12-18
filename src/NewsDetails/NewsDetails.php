<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\NewsDetails;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class NewsDetails implements GroupNodeInterface{
    use GroupNodeTraits;


    public function fetchDataFromGroupNode(GroupNode $groupNode): void
    {
        // TODO: Implement fetchDataFromGroupNode() method.
    }
}
