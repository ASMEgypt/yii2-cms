<?php
/**
 */

namespace execut\cms\controllers;


use execut\files\models\File;
use yii\console\Controller;

class ImagesController extends Controller
{
    public function actionCreateImagesThumbnails() {
        $images = File::find()->all();
        foreach ($images as $image) {
            $image->save();
        }
    }
}