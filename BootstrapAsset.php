<?php


namespace core\bootstrap;

use core\components\AssetBundle;

class BootstrapAsset extends AssetBundle
{
    public $basePath = '@vendor/pfilsx/core-lite-bootstrap3/assets';

    public function cssAssets()
    {
        return [
            'bootstrap.min.css' => static::POS_HEAD
        ];
    }

    public function jsAssets()
    {
        return [
            'bootstrap.min.js' => static::POS_BODY_END
        ];
    }

    public function fonts(){
        return [
            'fonts'
        ];
    }
}