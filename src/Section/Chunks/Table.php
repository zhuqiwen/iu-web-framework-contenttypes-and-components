<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Table\Body;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\Table\Header;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
class Table extends ChunkAbstract{


    public readonly Header $header;
    public readonly Body $body;


    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->header = new Header($chunkDetails->getSingleDescendantNodeByPath('table-header'));
        $this->body = new Body($chunkDetails->getSingleDescendantNodeByPath('table-body')->text ?? '');
    }

}