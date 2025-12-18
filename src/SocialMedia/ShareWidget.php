<?php
namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\SocialMedia;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class ShareWidget implements GroupNodeInterface
{
    use GroupNodeTraits;

    public readonly string $use;

    public function fetchDataFromGroupNode(GroupNode $shareWidgetGroupNode): void
    {
        $this->use = $shareWidgetGroupNode->getSingleDescendantNodeByPath('use')->text ?? '';
    }
}