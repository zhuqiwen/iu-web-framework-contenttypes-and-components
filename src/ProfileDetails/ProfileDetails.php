<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\ProfileDetails;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;

class ProfileDetails implements GroupNodeInterface{
    use GroupNodeTraits;

    public string $firstName;
    public string $lastName;
    public string $pronouns;
    public string $title;
    public array $campus;
    public string $department;
    public string $major;
    public string $hometown;
    public string $yearOfGraduation;
    public string $resumeLinkId;
    public string $resumeLinkPath;
    public string $shortBio;

    public Image $image;
    public Address $address;
    public Contact $contact;

    public function fetchDataFromGroupNode(GroupNode $profileDetailsGroupNode): void
    {
        $this->firstName = $profileDetailsGroupNode->getSingleDescendantNodeByPath('first-name')->text ?? '';
        $this->lastName = $profileDetailsGroupNode->getSingleDescendantNodeByPath('last-name')->text ?? '';
        $this->pronouns = $profileDetailsGroupNode->getSingleDescendantNodeByPath('pronouns')->text ?? '';
        $this->title = $profileDetailsGroupNode->getSingleDescendantNodeByPath('title')->text ?? '';
        $campusText = $profileDetailsGroupNode->getSingleDescendantNodeByPath('campus')->text ?? '';
        $this->campus = array_filter(explode('::CONTENT-XML-CHECKBOX::', $campusText));
        $this->department = $profileDetailsGroupNode->getSingleDescendantNodeByPath('department')->text ?? '';
        $this->major = $profileDetailsGroupNode->getSingleDescendantNodeByPath('major')->text ?? '';
        $this->hometown = $profileDetailsGroupNode->getSingleDescendantNodeByPath('hometown')->text ?? '';
        $this->yearOfGraduation = $profileDetailsGroupNode->getSingleDescendantNodeByPath('year-of-graduation')->text ?? '';
        $this->resumeLinkId = $profileDetailsGroupNode->getSingleDescendantNodeByPath('resume-cv')->fileId ?? '';
        $this->resumeLinkPath = $profileDetailsGroupNode->getSingleDescendantNodeByPath('resume-cv')->filePath ?? '';
        $this->shortBio = $profileDetailsGroupNode->getSingleDescendantNodeByPath('short-bio')->text ?? '';
        $this->image = new Image($profileDetailsGroupNode->getSingleDescendantNodeByPath('image-group'));
        $this->address = new Address($profileDetailsGroupNode->getSingleDescendantNodeByPath('address-group'));
        $this->contact = new Contact($profileDetailsGroupNode->getSingleDescendantNodeByPath('contact-group'));

    }
}
