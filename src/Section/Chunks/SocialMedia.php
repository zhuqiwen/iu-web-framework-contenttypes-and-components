<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class SocialMedia extends ChunkAbstract{


    public readonly string $position;
    public readonly string $type;
    public readonly string $url;
    public readonly string $disableCaption;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';
        $this->type = $chunkDetails->getSingleDescendantNodeByPath('social-type')->text ?? '';
        $this->url = $chunkDetails->getSingleDescendantNodeByPath('social-url')->text ?? '';
        $this->disableCaption = $chunkDetails->getSingleDescendantNodeByPath('disable-caption')->text ?? '';

    }

}