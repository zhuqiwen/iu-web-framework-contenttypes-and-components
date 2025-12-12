<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Text extends ChunkAbstract {


    //chunk header -> heading
    //header level -> heading level
    //content -> text content
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