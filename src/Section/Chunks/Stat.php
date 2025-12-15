<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class Stat extends ChunkAbstract{


    public readonly string $statNumber;
    public readonly string $position;
    public readonly string $headerLevel;
    public readonly string $content;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->statNumber = $chunkDetails->getSingleDescendantNodeByPath('stat-number')->text ?? '';
        $this->content = $chunkDetails->getSingleDescendantNodeByPath('content')->text ?? '';
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';

        $this->fetchDataLinkInfo($chunkDetails);
    }

}