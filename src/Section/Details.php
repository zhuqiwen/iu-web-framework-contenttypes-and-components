<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Details\Background;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Details implements GroupNodeInterface {

    use GroupNodeTraits;
    public Background $background;
    public string $grid;
    public string $breakout;
    public string $cssClass;
    public string $cssId;
    public string $bottomStyle;
    public string $header;
    public string $headerLevel;

    public function fetchDataFromGroupNode(GroupNode $detailsGroupNode):void
    {
        $this->background = new Background($detailsGroupNode->getSingleDescendantNodeByPath('background'));
        $this->grid = $detailsGroupNode->getSingleDescendantNodeByPath('grid')->text ?? '';
        $this->breakout = $detailsGroupNode->getSingleDescendantNodeByPath('breakout')->text ?? '';;
        $this->cssClass = $detailsGroupNode->getSingleDescendantNodeByPath('class')->text ?? '';;
        $this->cssId = $detailsGroupNode->getSingleDescendantNodeByPath('id')->text ?? '';;
        $this->bottomStyle = $detailsGroupNode->getSingleDescendantNodeByPath('bottom-style')->text ?? '';;
        $this->header = $detailsGroupNode->getSingleDescendantNodeByPath('header')->text ?? '';;
        $this->headerLevel = $detailsGroupNode->getSingleDescendantNodeByPath('header-level')->text ?? '';
    }

}