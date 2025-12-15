<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class Feature extends ChunkAbstract{


    public readonly string $header;
    public readonly string $headerLevel;
    public readonly string $position;
    public readonly string $subhead;
    public readonly string $content;
    public readonly string $imageId;
    public readonly string $imagePath;
    public readonly string $linkLabel;
    public readonly string $externalLink;
    public readonly string $internalLinkId;
    public readonly string $internalLinkPath;
    public readonly string $internalLinkType;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->header = $chunkDetails->getSingleDescendantNodeByPath('header')->text ?? '';
        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level')->text ?? '';
        $this->subhead = $chunkDetails->getSingleDescendantNodeByPath('subhead-feature')->text ?? '';
        $this->content = $chunkDetails->getSingleDescendantNodeByPath('content')->text ?? '';
        $imageNode = $chunkDetails->getSingleDescendantNodeByPath('image');
        $this->imageId = $imageNode->fileId ?? '';
        $this->imagePath = $imageNode->filePath ?? '';

        $internalLinkAssetNode = $chunkDetails->getSingleDescendantNodeByPath('link-internal');
        $this->externalLink = $chunkDetails->getSingleDescendantNodeByPath('link-external');


        $linkAssetObj = $this->getAssetStdClassObj($internalLinkAssetNode);
        $this->internalLinkId = $linkAssetObj->id;
        $this->internalLinkPath = $linkAssetObj->path;
        $this->internalLinkType = $linkAssetObj->type;
        $this->linkLabel = $chunkDetails->getSingleDescendantNodeByPath('link-label')->text ?? '';
    }

}