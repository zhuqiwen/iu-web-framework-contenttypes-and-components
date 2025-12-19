<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks\ChunkInterface;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Section implements GroupNodeInterface{

    use GroupNodeTraits;
    public string $type;
    public Details $details;
    /**
     * @var array of ChunkInterface
     */
    public array $chunks;


    public string $attachedPageId;
    public string $attachedPagePath;
    public string $customBlockId;
    public string $customBlockPath;

    public function fetchDataFromGroupNode(GroupNode $sectionGroupNode): void
    {
        //type
        $this->type = $sectionGroupNode->getSingleDescendantNodeByPath('type')->text ?? '';
        //details
        $this->details = new Details($sectionGroupNode->getSingleDescendantNodeByPath('details'));
        //chunks
        $this->chunks = $this->constructChunks($sectionGroupNode->getAllDescendantNodesByPath('chunk'));
        //attachedPageId
        //attachedPagePath
        //customBlockId;
        //customBlockPath;
    }

    public function constructChunks(array $chunkGroupNodesArray): array
    {
        $result = [];
        foreach ($chunkGroupNodesArray as $chunkGroupNode) {
            $chunkType = $chunkGroupNode->getSingleDescendantNodeByPath('type')->text ?? null;
            $chunkType = preg_replace('/[^a-zA-Z]+/', '', $chunkType);
            $className = __NAMESPACE__ . '\\Chunks\\' . $chunkType;
            if (class_exists($className)) {
                $result[] = new $className($chunkGroupNode->getSingleDescendantNodeByPath('details'));
            }
        }

        return $result;
    }


    public function getChunk(int $zeroBasedIndex): ChunkInterface | null
    {
        $result = null;
        if ($zeroBasedIndex < sizeof($this->chunks)) {
            $result = $this->chunks[$zeroBasedIndex];
        }

        return $result;
    }


    public function addChunk(ChunkInterface $chunk, int $position = -1): void
    {
        //append
        if ($position < 0){
            $this->chunks[] = $chunk;
        }else{//insert
            array_splice($this->chunks, $position, 0, [$chunk]);
        }
    }

    //TODO: add Details
    public function addDetails(Details $details): void
    {
        $this->details = $details;
    }
}