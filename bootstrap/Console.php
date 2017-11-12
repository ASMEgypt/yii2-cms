<?php
/**
 */

namespace execut\cms\bootstrap;

use execut\cms\controllers\ImagesController;
use execut\pages\Module;
use execut\yii\Bootstrap;
use yii\helpers\ArrayHelper;

class Console extends Common
{
    public function getDefaultDepends()
    {
        return ArrayHelper::merge(parent::getDefaultDepends(), [
            'modules' => [
                'alias' => [
                    'class' => \execut\alias\Module::class,
                    'plugins' => [
                        [
                            'class' => \execut\cms\pages\plugin\Alias::class,
                        ],
                    ],
                ],
            ],
            'bootstrap' => [
                'actions' => [
                    'class' => \execut\actions\Bootstrap::class,
                ],
                'pages' => [
                    'class' => \execut\pages\bootstrap\Console::class,
                ],
                'alias' => [
                    'class' => \execut\alias\bootstrap\Frontend::class,
                ],
                'files' => [
                    'class' => \execut\files\bootstrap\Common::class,
                ],
            ],
        ]);
    }

    public function bootstrap($app)
    {
        parent::bootstrap($app); // TODO: Change the autogenerated stub
        if (empty($app->controllerMap['migrate'])) {
            $app->controllerMap['migrate'] = [
                'class' => \bariew\moduleMigration\ModuleMigrateController::class,
                'templateFile' => '@vendor/execut/yii2-migration/views/template.php',
            ];
        }

        if (empty($app->controllerMap['images'])) {
            $app->controllerMap['images'] = [
                'class' => ImagesController::class
            ];
        }
    }
}