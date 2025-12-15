<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Image\Slide;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class Image extends ChunkAbstract{


    public readonly string $position;
    public readonly string $type;
    public readonly string $caption;
    public readonly string $attribution;
    public readonly string $singleImageId;
    public readonly string $singleImagePath;
    public readonly string $essayLargeImageId;
    public readonly string $essayLargeImagePath;
    public readonly string $essaySmallImageOneId;
    public readonly string $essaySmallImageOnePath;
    public readonly string $essaySmallImageTwoId;
    public readonly string $essaySmallImageTwoPath;
    public readonly string $largeImagePlacement;
    public readonly string $horizontalImagePlacement;
    public readonly string $verticalImagePlacement;
    public readonly array $slides;



    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';
        $this->type = $chunkDetails->getSingleDescendantNodeByPath('image-type')->text ?? '';

        match ($this->type){
            default => $this->fetchDataDefault($chunkDetails),
            'Single' => $this->fetchDataSingle($chunkDetails),
            'Essay' => $this->fetchDataEssay($chunkDetails),
            'Slideshow' => $this->fetchDataSlideshow($chunkDetails),
        };



    }

    public function fetchDataDefault(GroupNode $chunkDetails): void
    {

    }

    public function fetchDataSlideshow(GroupNode $chunkDetails): void
    {
        $slideGroupNodes = $chunkDetails->getSingleDescendantNodeByPath('slide');
        foreach ($slideGroupNodes as $slideGroupNode) {
            $this->slides[] = new Slide($slideGroupNode);
        }
    }
    public function fetchDataEssay(GroupNode $chunkDetails): void
    {
        $this->caption = $chunkDetails->getSingleDescendantNodeByPath('caption')->text ?? '';
        $this->attribution = $chunkDetails->getSingleDescendantNodeByPath('attribution')->text ?? '';
        $this->essayLargeImageId = $chunkDetails->getSingleDescendantNodeByPath('essay-large-image')->fileId ?? '';
        $this->essayLargeImagePath = $chunkDetails->getSingleDescendantNodeByPath('essay-large-image')->filePath ?? '';
        $this->essaySmallImageOneId = $chunkDetails->getSingleDescendantNodeByPath('essay-small-image-1')->fileId ?? '';
        $this->essaySmallImageOnePath = $chunkDetails->getSingleDescendantNodeByPath('essay-small-image-1')->filePath ?? '';
        $this->essaySmallImageTwoId = $chunkDetails->getSingleDescendantNodeByPath('essay-small-image-2')->fileId ?? '';
        $this->essaySmallImageTwoPath = $chunkDetails->getsingleDescendantNodeByPath('essay-small-image-2')->filePath ?? '';

        $this->largeImagePlacement = $chunkDetails->getSingleDescendantNodeByPath('large-image-placement')->text ?? '';
        $this->horizontalImagePlacement = $chunkDetails->getsingleDescendantNodeByPath('horizontal-placement')->text ?? '';
        $this->verticalImagePlacement = $chunkDetails->getsingleDescendantNodeByPath('vertical-placement')->text ?? '';
    }

    public function fetchDataSingle(GroupNode $chunkDetails): void
    {
        $this->caption = $chunkDetails->getSingleDescendantNodeByPath('caption')->text ?? '';
        $this->attribution = $chunkDetails->getSingleDescendantNodeByPath('attribution')->text ?? '';
        $this->singleImageId = $chunkDetails->getSingleDescendantNodeByPath('image')->fileId ?? '';
        $this->singleImagePath = $chunkDetails->getSingleDescendantNodeByPath('image')->filePath ?? '';
    }

}