<?php


namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Pages;

use Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Section\Section;

interface PageInterface{

    public function addSection(Section $section, int $position = -1):void;
}