<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\EventDetails;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class EventDetails implements GroupNodeInterface{
    use GroupNodeTraits;


    public function fetchDataFromGroupNode(GroupNode $groupNode): void
    {
        // TODO: Implement fetchDataFromGroupNode() method.
    }
}
