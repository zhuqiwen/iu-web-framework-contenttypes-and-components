<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\ProfileDetails;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class SocialMediaChannel implements GroupNodeInterface{
    use GroupNodeTraits;

    public string $channel;
    public string $url;



    public function fetchDataFromGroupNode(GroupNode $channelGroupGroupNode): void
    {
        $this->channel = $channelGroupGroupNode->getSingleDescendantNodeByPath('channel')->text ?? '';
        $this->url = $channelGroupGroupNode->getSingleDescendantNodeByPath('url')->text ?? '';

    }
}
