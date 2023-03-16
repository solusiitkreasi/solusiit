<?php

namespace App\Traits;

use App\Models\Backend\Setting;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Str;

trait Seo
{
    use SEOToolsTrait;
    public function meta($title=null, $description=null, $keywords=null, $image=null, $type='pages'){
        return $this->my_seo($title, $description, $keywords, $image, $type='pages');
    }

    public function my_seo($title=null, $description=null, $keywords=null, $image = null, $type='pages'){        

        
        SEOmeta::setTitle($title);
        // SEOmeta::setTitleDefault(Setting::getValue('meta_title'));
        $this->seo()->setDescription($description);
        SEOmeta::setKeywords($keywords);
        $this->seo()->opengraph()->addImage($image);
        $this->seo()->opengraph()->addProperty('image:width','100%');
        $this->seo()->opengraph()->addProperty('image:height','100%');
        $this->seo()->opengraph()->addProperty('type', $type);        
        $this->seo()->jsonLd()->setType($type);
    }
}
