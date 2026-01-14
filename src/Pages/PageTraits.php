<?php


namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Pages;

use Edu\IU\Framework\GenericUpdater\Asset\Foldered\Page;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\BannerInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Section;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\SocialMedia\SocialMedia;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use Edu\IU\RSB\StructuredDataNodes\NodeInterface;
use Edu\IU\RSB\StructuredDataNodes\SystemDataStructureRoot;

trait PageTraits{

    public readonly string $path;
    public readonly string $name;
    public readonly string $id;
    public readonly string $parentFolderId;
    public readonly string $parentFolderPath;
    /**
     * @var array of Section object
     */
    public readonly array $sections;
    public readonly SocialMedia $socialMedia;

    public readonly ?BannerInterface $banner;
    public readonly \stdClass $metadata;
    public readonly string $contentTypeId;
    public readonly string $contentTypePath;



    public function __construct(?Page $page = null)
    {
        //read
        if ($page) {
            $this->init($page);
        }

    }

    public function addSection(Section $section, int $position = -1):void
    {
        //append
        if ($position < 0){
            $this->sections[] = $section;
        }else{//insert
            array_splice($this->sections, $position, 0, [$section]);
        }

    }

    protected function readFromPage(Page $page, array $otherAttributesAndNodes = []): void
    {
        $systemDataStructureRoot = new SystemDataStructureRoot($page->getOldStructuredDataNode());
        $assetData = $page->getOldAsset();
        //metadata
        $this->metadata = $assetData->metadata;
        //path
        $this->path = $assetData->path ?? '';
        //name
        $this->name = $assetData->name ?? '';
        $this->id = $assetData->id ?? '';
        //parent folder path
        $this->parentFolderId = $assetData->parentFolderId ?? '';
        $this->parentFolderPath = $assetData->parentFolderPath ?? '';
        $this->contentTypeId = $assetData->contentTypeId ?? '';
        $this->contentTypePath = $assetData->contentTypePath ?? '';
        //social media
        $this->socialMedia = new SocialMedia($systemDataStructureRoot->getSingleDescendantNodeByPath('social-media-meta'));
        //banner
        $this->banner = $this->fetchBanner($systemDataStructureRoot->getSingleDescendantNodeByPath('banner'));
        //section
        $this->sections = $this->fetchSections($systemDataStructureRoot->getAllDescendantNodesByPath('section'));

        foreach ($otherAttributesAndNodes as $attribute => $nodeInfo) {
            if(property_exists($this, $attribute)) {
                $nodePath = $nodeInfo['nodePath'];
                $method = 'fetch' . ucfirst($attribute);
                if (method_exists($this, $method)) {
                    $nodeOrNodes = $nodeInfo['singleOrAll'] == 'single' ? $systemDataStructureRoot->getSingleDescendantNodeByPath($nodePath) : $systemDataStructureRoot->getAllDescendantNodesByPath($nodePath);
                    $this->$attribute = $this->$method($nodeOrNodes);
                }

            }
        }
    }
    protected function fetchBanner(NodeInterface | GroupNode $bannerGroupNode): BannerInterface | null
    {
        $bannerType = $bannerGroupNode->getSingleDescendantNodeByPath('type')->text ?? '';
        $bannerType = preg_replace('/[^a-zA-Z]+/', '', $bannerType);
        $className = 'Edu\\IU\\RSB\\IUWebFrameworkContentTypesAndComponents\\Banners\\' . $bannerType;

        return empty($bannerType) ? null : new $className($bannerGroupNode);
    }


    public function getSection(int $zeroBasedIndex): Section | null
    {
        $result = null;
        if ($zeroBasedIndex < sizeof($this->sections)) {
            $result = $this->sections[$zeroBasedIndex];
        }

        return $result;
    }



    protected function fetchSections(array $sectionGroupNodesArray): array
    {
        $result = [];

        foreach($sectionGroupNodesArray as $sectionGroupNode){
            $result[] = new Section($sectionGroupNode);
        }

        return $result;
    }


}