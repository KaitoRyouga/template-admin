<?php

namespace App\Helper;

use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class Seo
{

    public static function setting($title, $key, $url, $type, $img = null)
    {
        $imgSEO = is_null($img) ? url(Common::getSetting(Setting::LOGO)) : url($img);

        SEOMeta::setTitle($title);
        SEOMeta::setKeywords($key);
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setUrl($url);
        OpenGraph::setType($type);
        OpenGraph::addImage($imgSEO, ['secure_url' => $imgSEO, 'height' => 768, 'width' => 1024]);

        TwitterCard::setTitle($title);

        JsonLd::setTitle($title);
        JsonLd::setUrl($url);
        JsonLd::setType($type);
        JsonLd::addImage($imgSEO);
    }

    public static function getSetting($key)
    {
        $data = Setting::where('setting_key', $key)->first();
        
        if (!empty($data)) {
            return $data->setting_value;
        }
        
       return "";
       
    }
}
