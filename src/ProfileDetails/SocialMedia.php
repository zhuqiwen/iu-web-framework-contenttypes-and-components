<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\ProfileDetails;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class SocialMedia implements GroupNodeInterface{
    use GroupNodeTraits;


    public array $channels = [];

    public function fetchDataFromGroupNode(GroupNode $socialMediaGroupGroupNode): void
    {
        $channelNodes = $socialMediaGroupGroupNode->getAllDescendantNodesByPath('channel-group');
        foreach($channelNodes as $channelNode){
            $this->channels[] = new SocialMediaChannel($channelNode);
        }
    }
}
