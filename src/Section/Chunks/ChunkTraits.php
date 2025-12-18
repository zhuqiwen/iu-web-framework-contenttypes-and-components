<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\StructuredDataNodes\GroupNode;

trait ChunkTraits{


    public readonly string $externalLink;
    public readonly string $internalLinkId;
    public readonly string $internalLinkPath;
    public readonly string $internalLinkType;
    public readonly string $linkLabel;
    public function getType(): string
    {
        return new \ReflectionClass($this)->getShortName();
    }

    public function fetchDataLinkInfo(GroupNode $chunkDetailsGroupNode):void
    {
        $internalLinkAssetNode = $chunkDetailsGroupNode->getSingleDescendantNodeByPath('link-internal');
        $this->externalLink = $chunkDetailsGroupNode->getSingleDescendantNodeByPath('link-external');


        $linkAssetObj = $this->getAssetStdClassObj($internalLinkAssetNode);
        $this->internalLinkId = $linkAssetObj->id;
        $this->internalLinkPath = $linkAssetObj->path;
        $this->internalLinkType = $linkAssetObj->type;
        $this->linkLabel = $chunkDetailsGroupNode->getSingleDescendantNodeByPath('link-label')->text ?? '';
    }
}