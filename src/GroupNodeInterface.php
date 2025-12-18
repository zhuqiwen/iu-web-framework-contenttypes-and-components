<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents;

use Edu\IU\RSB\StructuredDataNodes\GroupNode;

interface GroupNodeInterface{

    public function fetchDataFromGroupNode(GroupNode $groupNode): void;


    public function getAttributes(): array;

}