<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class InteractivePanel extends ChunkAbstract{


    public readonly string $header;
    public readonly string $headerLevel;
    public readonly string $position;
    public readonly string $subhead;
    public readonly string $externalLink;
    public readonly string $internalLinkId;
    public readonly string $internalLinkPath;
    public readonly string $internalLinkType;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {

        $this->header = $chunkDetails->getSingleDescendantNodeByPath('header')->text ?? '';
        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level')->text ?? '';
        $this->subhead = $chunkDetails->getSingleDescendantNodeByPath('subhead')->text ?? '';
        $this->externalLink = $chunkDetails->getSingleDescendantNodeByPath('link-external')->text ?? '';

        $internalLinkObj = $this->getAssetStdClassObj($chunkDetails->getSingleDescendantNodeByPath('link-internal'));
        $this->internalLinkId = $internalLinkObj->id;
        $this->internalLinkPath = $internalLinkObj->path;
        $this->internalLinkType = $internalLinkObj->type;
    }

}