<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use function PHPUnit\Framework\matches;

class Feed extends ChunkAbstract{


    public readonly string $header;
    public readonly string $headerLevel;
    public readonly string $position;

    public readonly string $feedType;
    public readonly string $feedName;

    public readonly string $feedUrl;
    public readonly string $mode;
    public readonly string $max;
    public readonly string $linkLabel;
    public readonly string $blockId;
    public readonly string $blockPath;
    public readonly string $alphabetical;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->header = $chunkDetails->getSingleDescendantNodeByPath('header')->text ?? '';
        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level')->text ?? '';
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';
        $this->feedType = $chunkDetails->getSingleDescendantNodeByPath('feed-type')->text ?? '';

        match ($this->feedType) {
            default => $this->fetchDataNothing($chunkDetails),
            'Profiles' => $this->fetchDataProfile($chunkDetails),
            'News - Manual' => $this->fetchDataNewsManual($chunkDetails),
            'News - IU Newsroom' => $this->fetchDataNewsIUNewsRoom($chunkDetails),
            'Events - Manual' => $this->fetchDataEventsManual($chunkDetails),
            'Events - IU Calendar' => $this->fetchDataEventsIUCalendar($chunkDetails),
            'Custom' => $this->fetchDataCustom($chunkDetails),
        };

        $this->mode = $chunkDetails->getSingleDescendantNodeByPath('mode')->text ?? '';
        $this->max = $chunkDetails->getSingleDescendantNodeByPath('count-max')->text ?? '';

        $this->fetchDataLinkInfo($chunkDetails);



    }

    public function fetchDataProfile(GroupNode $chunkDetails): void
    {
        $this->alphabetical = $chunkDetails->getSingleDescendantNodeByPath('alpha-order')->text ?? '';
        $this->fetchDataBlock($chunkDetails);

    }

    public function fetchDataNewsManual(GroupNode $chunkDetails): void
    {
        $this->fetchDataBlock($chunkDetails);
    }

    public function fetchDataNewsIUNewsRoom(GroupNode $chunkDetails): void
    {
        $this->feedUrl = $chunkDetails->getSingleDescendantNodeByPath('id')->text ?? '';

    }

    public function fetchDataEventsManual(GroupNode $chunkDetails): void
    {
        $this->fetchDataBlock($chunkDetails);
    }



    public function fetchDataEventsIUCalendar(GroupNode $chunkDetails): void
    {
        $this->feedUrl = $chunkDetails->getSingleDescendantNodeByPath('id')->text ?? '';
    }

    public function fetchDataCustom(GroupNode $chunkDetails): void
    {
        $this->feedName = $chunkDetails->getSingleDescendantNodeByPath('feed-name')->text ?? '';
        $this->feedUrl = $chunkDetails->getSingleDescendantNodeByPath('id')->text ?? '';
        $this->fetchDataBlock($chunkDetails);
    }

    public function fetchDataBlock(GroupNode $chunkDetails): void
    {
        $block = $chunkDetails->getSingleDescendantNodeByPath('block');
        $this->blockId = $block->blockId ?? '';
        $this->blockPath = $block->blockPath ?? '';
    }
}