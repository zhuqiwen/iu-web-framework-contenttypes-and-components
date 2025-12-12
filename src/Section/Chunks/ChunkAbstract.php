<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;

abstract class ChunkAbstract implements GroupNodeInterface, ChunkInterface
{
    use GroupNodeTraits;
    use ChunkTraits;

}