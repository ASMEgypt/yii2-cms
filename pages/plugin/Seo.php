<?php
/**
 */

namespace execut\cms\pages\plugin;


use execut\pages\models\Page;
use execut\seo\Plugin;

class Seo implements Plugin
{
    public function getKeywordsModels()
    {
        return [
            Page::class,
        ];
    }

    public function getFieldsModels()
    {
        return [
            Page::class,
        ];
    }

    public function getKeywordFieldsPlugins() {
        return [
            [
                'class' => \execut\pages\crudFields\VsPagesPlugin::class,
                'linkAttribute' => 'seo_keyword_id',
                'vsModelClass' => \execut\cms\seo\models\KeywordVsPage::class,
            ],
        ];
    }
}