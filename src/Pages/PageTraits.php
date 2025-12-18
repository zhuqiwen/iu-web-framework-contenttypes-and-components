<?php


namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Pages;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners\BannerInterface;

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



}