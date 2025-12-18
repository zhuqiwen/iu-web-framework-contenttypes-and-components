<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class Code extends ChunkAbstract{

    public readonly string $position;
    public readonly string $code;



    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';
        $this->code = $chunkDetails->getSingleDescendantNodeByPath('code')->text ?? '';

    }

}