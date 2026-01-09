<?php

namespace Edu\IU\RSB\IUWebFrameworkContentTypesAndComponents\Banners;

use Edu\IU\RSB\StructuredDataNodes\GroupNode;

trait BannerTraits{


    public function getType():string
    {
        return new \ReflectionClass($this)->getShortName();
    }
}
