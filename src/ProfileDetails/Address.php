<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\ProfileDetails;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class Address implements GroupNodeInterface{
    use GroupNodeTraits;

    public string $buildingRoom;
    public string $addressLine1;
    public string $addressLine2;
    public string $city;
    public string $state;
    public string $zipCode;



    public function fetchDataFromGroupNode(GroupNode $addressGroupGroupNode): void
    {
        $this->buildingRoom = $addressGroupGroupNode->getSingleDescendantNodeByPath('building-room')->text ?? '';
        $this->addressLine1 = $addressGroupGroupNode->getSingleDescendantNodeByPath('address-1')->text ?? '';
        $this->addressLine2 = $addressGroupGroupNode->getSingleDescendantNodeByPath('address-2')->text ?? '';
        $this->city = $addressGroupGroupNode->getSingleDescendantNodeByPath('city')->text ?? '';
        $this->state = $addressGroupGroupNode->getSingleDescendantNodeByPath('state')->text ?? '';
        $this->zipCode = $addressGroupGroupNode->getSingleDescendantNodeByPath('zip-code')->text ?? '';

    }
}
