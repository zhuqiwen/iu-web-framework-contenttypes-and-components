<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class Audio extends ChunkAbstract{

    public readonly string $caption;
    public readonly string $headerLevel;
    public readonly string $position;
    public readonly  string $transcript;
    public readonly  string $attribution;
    public readonly  string $vttId;
    public readonly  string $vttPath;
    public readonly  string $mp3Id;
    public readonly  string $mp3Path;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level')->text ?? '';
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';
        $this->caption = $chunkDetails->getSingleDescendantNodeByPath('caption')->text ?? '';
        $this->transcript = $chunkDetails->getSingleDescendantNodeByPath('transcript')->text ?? '';
        $this->attribution = $chunkDetails->getSingleDescendantNodeByPath('attribution')->text ?? '';


        $vtt = $chunkDetails->getSingleDescendantNodeByPath('vtt');
        $this->vttId = $vtt->fileId ?? '';
        $this->vttPath = $vtt->filePath ?? '';

        $mp3 = $chunkDetails->getSingleDescendantNodeByPath('mp3');
        $this->mp3Id = $mp3->fileId ?? '';
        $this->mp3Path = $mp3->filePath ?? '';

    }

}