<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Pages;


use Edu\IU\Framework\GenericUpdater\Asset\Foldered\Page;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\ProfileDetails\ProfileDetails;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Section;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class PageProfile implements PageInterface {

    use PageTraits;
    public ProfileDetails $profileDetails;


    /**
     * called by readFromPage when specifying attribute, such as $profileDetails and node info
     * @param GroupNode $profileDetailsGroupNode
     * @return ProfileDetails
     */
    protected function fetchProfileDetails(GroupNode $profileDetailsGroupNode): ProfileDetails
    {
        return new ProfileDetails($profileDetailsGroupNode);
    }

    protected function init(Page $page): void
    {
        $this->readFromPage($page, ['profileDetails' => ['singleOrAll' => 'single', 'nodePath' => 'profile-details']]);
    }

}
