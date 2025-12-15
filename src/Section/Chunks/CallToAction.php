<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\CallToAction\CTALink;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class CallToAction extends ChunkAbstract{

    public readonly string $header;
    public readonly string $headerLevel;
    public readonly string $position;
    public readonly array $links;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->header = $chunkDetails->getSingleDescendantNodeByPath('header')->text ?? '';
        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level')->text ?? '';
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';
        $linkNodes = $chunkDetails->getAllDescendantNodesByPath('link');
        foreach($linkNodes as $linkNode){
            $this->links[] = new CTALink($linkNode);
        }
    }

}