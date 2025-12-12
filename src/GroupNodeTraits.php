<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents;

use Edu\IU\RSB\StructuredDataNodes\GroupNode;

trait GroupNodeTraits{

    public function __construct(GroupNode $groupNode)
    {
        $this->fetchDataFromGroupNode($groupNode);
    }
}