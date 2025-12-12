<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents;

use Edu\IU\RSB\StructuredDataNodes\Asset\AssetNode;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

trait GroupNodeTraits{

    public function __construct(GroupNode $groupNode)
    {
        $this->fetchDataFromGroupNode($groupNode);
    }

    public function getAssetStbClassObj(AssetNode $node): \stdClass
    {
        if ($node->assetType == 'page,file,symlink'){

            $obj = [
                'type' => $node->pageId ? 'page' :
                    ($node->fileId ? 'file' :
                        ($node->symlinkId ? 'symlink' :
                            ($node->blockId ? 'block' : '')
                        )
                    ),
            ];


        }else {
            $obj = [
                'type' => $node->assetType ?? '',
            ];
        }

        $obj['id'] = match ($obj['type']) {
            'page' => $node->pageId,
            'file' => $node->fileId,
            'symlink' => $node->symlinkId,
            'block' => $node->blockId,
            default => ''
        };

        $obj['path'] = match ($obj['type']) {
            'page' => $node->pagePath,
            'file' => $node->filePath,
            'symlink' => $node->symlinkPath,
            'block' => $node->blockPath,
            default => ''
        };





        return (object)$obj;

    }

}