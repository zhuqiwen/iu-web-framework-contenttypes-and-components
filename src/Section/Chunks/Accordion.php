<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Accordion\Fold;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Accordion extends ChunkAbstract{
    public readonly string $position;
    public readonly string $headerLevel;
    public readonly array $folds;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';
        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level-accordion')->text ?? '';

        $foldGroupNodes = $chunkDetails->getAllDescendantNodesByPath('fold');
        foreach($foldGroupNodes as $foldGroupNode){
            $this->folds[] = new Fold($foldGroupNode);
        }
    }

}