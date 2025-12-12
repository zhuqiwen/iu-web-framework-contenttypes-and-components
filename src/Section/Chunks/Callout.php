<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class Callout extends ChunkAbstract{

    public readonly string $imageId;
    public readonly string $imagePath;
    public readonly string $content;
    public readonly string $position;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->imageId = $chunkDetails->getSingleDescendantNodeByPath('image')->fileId ?? '';
        $this->imagePath = $chunkDetails->getSingleDescendantNodeByPath('image')->filePath ?? '';
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';
        $this->content = $chunkDetails->getSingleDescendantNodeByPath('content')->text ?? '';
    }

}