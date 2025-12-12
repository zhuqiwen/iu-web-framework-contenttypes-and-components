<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\StructuredDataNodes\GroupNode;

trait ChunkTraits{


    public function getType(): string
    {
        return new \ReflectionClass($this)->getShortName();
    }

}