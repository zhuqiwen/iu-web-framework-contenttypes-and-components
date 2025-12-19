<?php
namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\SocialMedia;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class SocialMedia implements GroupNodeInterface{
    use GroupNodeTraits;

    public readonly ShareWidget $shareWidget;
    public readonly Facebook $facebook;
    public readonly Twitter $twitter;



    public function fetchDataFromGroupNode(GroupNode $socialMediaGroupNode): void
    {
        $this->shareWidget = new ShareWidget($socialMediaGroupNode->getSingleDescendantNodeByPath('share'));
        $this->facebook = new Facebook($socialMediaGroupNode->getSingleDescendantNodeByPath('facebook'));
        $this->twitter = new Twitter($socialMediaGroupNode->getSingleDescendantNodeByPath('twitter'));
    }
}