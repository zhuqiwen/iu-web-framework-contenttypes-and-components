<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\ProfileDetails;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Contact implements GroupNodeInterface{
    use GroupNodeTraits;


    public string $phoneNumber;
    public string $email;
    public string $websiteUrl;
    public SocialMedia $socialMedia;
    public function fetchDataFromGroupNode(GroupNode $contactGroupGroupNode): void
    {
        $this->phoneNumber = $contactGroupGroupNode->getSingleDescendantNodeByPath('phone-number')->text ?? '';
        $this->email = $contactGroupGroupNode->getSingleDescendantNodeByPath('email')->text ?? '';
        $this->websiteUrl = $contactGroupGroupNode->getSingleDescendantNodeByPath('website-url')->text ?? '';
        $this->socialMedia = new SocialMedia($contactGroupGroupNode->getSingleDescendantNodeByPath('social-media-group'));
    }
}
