<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class CodeSnippet extends ChunkAbstract{


    public readonly string $header;
    public readonly string $headerLevel;
    public readonly string $content;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->header = $chunkDetails->getSingleDescendantNodeByPath('header')->text ?? '';
        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level')->text ?? '';
        $this->content = $chunkDetails->getSingleDescendantNodeByPath('content')->text ?? '';
    }

}