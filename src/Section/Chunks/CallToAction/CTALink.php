<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\CallToAction;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\ChunkInterface;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class CTALink implements GroupNodeInterface {

    use GroupNodeTraits;
    public readonly string $linkLabel;
    public readonly string $internalLinkId;
    public readonly string $internalLinkPath;
    public readonly string $internalLinkType;
    public readonly string $externalLink;

    public function fetchDataFromGroupNode(GroupNode $linkGroupNode):void
    {
        $this->linkLabel = $linkGroupNode->getSingleDescendantNodeByPath('link-label')->text ?? '';
        $this->externalLink = $linkGroupNode->getSingleDescendantNodeByPath('link-external')->text ?? '';
        $internalLinkObj = $this->getAssetStbClassObj($linkGroupNode->getSingleDescendantNodeByPath('link-internal'));
        $this->internalLinkId = $internalLinkObj->id;
        $this->internalLinkPath = $internalLinkObj->path;
        $this->internalLinkType = $internalLinkObj->type;
    }

}