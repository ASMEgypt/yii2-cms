<?php
/**
 */

namespace execut\cms\bootstrap;


use execut\yii\Bootstrap;

class Common extends Bootstrap
{
    public function getDefaultDepends()
    {
        return [
            'modules' => [
                'menu' => [
                    'class' => \execut\menu\Module::class,
                    'plugins' => [
                        [
                            'class' => \execut\cms\pages\plugin\Menu::class,
                        ],
                    ],
                ],
                'pages' => [
                    'class' => \execut\pages\Module::class,
                    'plugins' => [
                        [
                            'class' => \execut\cms\seo\plugin\Pages::class,
                        ],
                        [
                            'class' => \execut\cms\alias\plugin\Pages::class,
                        ],
                    ],
                ],
                'settings' => [
                    'class' => \execut\settings\Module::class,
                ],
            ],
        ];
    }
}