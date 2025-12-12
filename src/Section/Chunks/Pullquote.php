<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class Pullquote extends ChunkAbstract{


    public readonly string $imageId;
    public readonly string $imagePath;
    public readonly string $attribution;
    public readonly string $content;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->imageId = $chunkDetails->getSingleDescendantNodeByPath('image')->fileId ?? '';
        $this->imagePath = $chunkDetails->getSingleDescendantNodeByPath('image')->filePath ?? '';
        $this->attribution = $chunkDetails->getSingleDescendantNodeByPath('attribution')->text ?? '';
        $this->content = $chunkDetails->getSingleDescendantNodeByPath('content')->text ?? '';
    }

}