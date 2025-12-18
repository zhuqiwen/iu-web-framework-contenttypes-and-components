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

}