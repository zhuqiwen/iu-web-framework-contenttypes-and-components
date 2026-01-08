<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Chunks;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeInterface;
use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\GroupNodeTraits;
use Edu\IU\RSB\StructuredDataNodes\GroupNode;
use function PHPUnit\Framework\matches;

class Video extends ChunkAbstract{


    //strings
    public string $headerLevel;
    public string $videoType;
    public string $position;
    public string $widescreen;
    public string $title;
    public string $caption;
    public string $transcript;

    public string $url;
    public string $urlDescribedVersion;

    //assets
    public string $vttId;
    public string $vttPath;

    public string $descriptionsFileId;
    public string $descriptionsFilePath;

    public string $thumbnailId;
    public string $thumbnailPath;

    public string $mp4Id;
    public string $mp4Path;
    public string $webmId;
    public string $webmPath;
    public string $mp4DescribedId;
    public string $mp4DescribedPath;
    public string $webmDescribedId;
    public string $webmDescribedPath;





    public function fetchDataFromGroupNode(GroupNode $chunkDetails): void
    {
        $this->videoType = $chunkDetails->getSingleDescendantNodeByPath('video-type')->text ?? '';
        $this->position = $chunkDetails->getSingleDescendantNodeByPath('position')->text ?? '';

        match($this->videoType){
            default => $this->fetchDataNothing($chunkDetails),
            'YouTube' => $this->fetchDataYouTube($chunkDetails),
            'Vimeo' => $this->fetchDataVimeo($chunkDetails),
            'Kaltura' => $this->fetchDataKaltura($chunkDetails),
            'HTML5' => $this->fetchDataHTML5($chunkDetails),
        };
    }



    public function fetchDataYouTube(GroupNode $chunkDetails): void
    {
        $this->title = $chunkDetails->getSingleDescendantNodeByPath('title')->text ?? '';

        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level')->text ?? '';
        $this->url = $chunkDetails->getSingleDescendantNodeByPath('url')->text ?? '';
        $this->urlDescribedVersion = $chunkDetails->getSingleDescendantNodeByPath('video-id-described')->text ?? '';


        $vtt = $chunkDetails->getSingleDescendantNodeByPath('vtt');
        $this->vttId = $vtt->fileId ?? '';
        $this->vttPath = $vtt->filePath ?? '';

        $description = $chunkDetails->getSingleDescendantNodeByPath('descriptions-file');
        $this->descriptionsFileId = $description->fileId ?? '';
        $this->descriptionsFilePath = $description->filePath ?? '';

        $this->caption = $chunkDetails->getSingleDescendantNodeByPath('caption')->text ?? '';
        $this->transcript = $chunkDetails->getSingleDescendantNodeByPath('transcript')->text ?? '';


    }

    public function fetchDataVimeo(GroupNode $chunkDetails): void
    {
        $this->fetchDataYouTube($chunkDetails);
    }

    public function fetchDataKaltura(GroupNode $chunkDetails): void
    {
        $this->widescreen = $chunkDetails->getSingleDescendantNodeByPath('widescreen')->text ?? '';
        $this->url = $chunkDetails->getSingleDescendantNodeByPath('url')->text ?? '';
        $this->title = $chunkDetails->getSingleDescendantNodeByPath('title')->text ?? '';
        $this->caption = $chunkDetails->getSingleDescendantNodeByPath('caption')->text ?? '';
        $this->transcript = $chunkDetails->getSingleDescendantNodeByPath('transcript')->text ?? '';

    }

    public function fetchDataHTML5(GroupNode $chunkDetails): void
    {
        $this->headerLevel = $chunkDetails->getSingleDescendantNodeByPath('header-level')->text ?? '';

        $thumbnail = $chunkDetails->getSingleDescendantNodeByPath('thumbnail');
        $this->thumbnailId = $thumbnail->fileId ?? '';
        $this->thumbnailPath = $thumbnail->filePath ?? '';

        $vtt = $chunkDetails->getSingleDescendantNodeByPath('vtt');
        $this->vttId = $vtt->fileId ?? '';
        $this->vttPath = $vtt->filePath ?? '';

        $mp4 = $chunkDetails->getSingleDescendantNodeByPath('mp4');
        $this->mp4Id = $mp4->fileId ?? '';
        $this->mp4Path = $mp4->filePath ?? '';

        $webm = $chunkDetails->getSingleDescendantNodeByPath('webm');
        $this->webmId = $webm->fileId ?? '';
        $this->webmPath = $webm->filePath ?? '';

        $mp4Described = $chunkDetails->getSingleDescendantNodeByPath('mp4-described');
        $this->mp4DescribedId = $mp4Described->fileId ?? '';
        $this->mp4DescribedPath = $mp4Described->filePath ?? '';

        $webmDescribed = $chunkDetails->getSingleDescendantNodeByPath('webm-described');
        $this->webmDescribedId = $webmDescribed->fileId ?? '';
        $this->webmDescribedPath = $webmDescribed->filePath ?? '';

        $description = $chunkDetails->getSingleDescendantNodeByPath('descriptions-file');
        $this->descriptionsFileId = $description->fileId ?? '';
        $this->descriptionsFilePath = $description->filePath ?? '';

        $this->caption = $chunkDetails->getSingleDescendantNodeByPath('caption')->text ?? '';
        $this->transcript = $chunkDetails->getSingleDescendantNodeByPath('transcript')->text ?? '';


    }
}