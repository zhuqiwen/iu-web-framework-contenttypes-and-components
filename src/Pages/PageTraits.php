<?php


namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Pages;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\BannerInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Section;

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
    public readonly ?BannerInterface $banner;
    public readonly \stdClass $metadata;
    public readonly string $contentTypeId;
    public readonly string $contentTypePath;



    public function addSection(Section $section, int $position = -1):void
    {
        //append
        if ($position < 0){
            $this->sections[] = $section;
        }else{//insert
            array_splice($this->sections, $position, 0, [$section]);
        }

    }

}