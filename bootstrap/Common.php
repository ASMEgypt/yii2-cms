<?php
/**
 */

namespace execut\cms\bootstrap;

use execut\cms\files\plugin\Images;
use execut\yii\Bootstrap;

class Common extends Bootstrap
{
    public function getDefaultDepends()
    {
        return [
            'bootstrap' => [
                'images' => [
                    'class' => \execut\images\bootstrap\Common::class,
                ],
                'seo' => [
                    'class' => \execut\seo\bootstrap\Common::class,
                ],
            ],
            'modules' => [
                'seo' => [
                    'class' => \execut\seo\Module::class,
                    'plugins' => [
                        [
                            'class' => \execut\cms\pages\plugin\Seo::class,
                        ],
                        [
                            'class' => \execut\cms\files\plugin\Seo::class,
                        ],
                    ],
                ],
                'images' => [
                    'class' => \execut\images\Module::class,
                    'plugins' => [
                        [
                            'class' => Images::class,
                        ]
                    ],
                ],
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
                        [
                            'class' => \execut\cms\menu\plugin\Pages::class,
                        ],
                        [
                            'class' => \execut\cms\files\plugin\Pages::class,
                        ],
                    ],
                ],
                'files' => [
                    'class' => \execut\files\Module::class,
                    'plugins' => [
                        [
                            'class' => \execut\cms\alias\plugin\Files::class,
                        ],
                        [
                            'class' => \execut\cms\pages\plugin\Files::class,
                        ],
                        [
                            'class' => \execut\cms\images\plugin\Files::class,
                        ],
                        [
                            'class' => \execut\cms\seo\plugin\Files::class,
                        ],
                    ],
                ],
                'settings' => [
                    'class' => \execut\settings\Module::class,
                ],
                'alias' => [
                    'class' => \execut\alias\Module::class,
                    'plugins' => [
                        'pages' => [
                            'class' => \execut\cms\pages\plugin\Alias::class,
                        ],
                        [
                            'class' => \execut\cms\files\plugin\Alias::class,
                        ],
                        [
                            'class' => \execut\cms\images\plugin\Alias::class,
                        ],
                    ],
                ],
            ],
        ];
    }

    public function bootstrap($app)
    {
        parent::bootstrap($app); // TODO: Change the autogenerated stub
        \yii::setAlias('@execut', '@vendor/execut');
        $this->initLayout($app);
    }

    /**
     * @param $app
     * @return bool
     */
    protected function isStandardLayout($app)
    {
        $result = $app->layoutPath === $app->getViewPath() . DIRECTORY_SEPARATOR . 'layouts' && $app->layout === 'main';
        return $result;
    }

    /**
     * @param $app
     */
    protected function initLayout($app)
    {
        if ($this->isStandardLayout($app)) {
            $app->layoutPath = '@vendor/execut/yii2-cms/views/layouts';
            $app->layout = 'backend';
        }
    }
}