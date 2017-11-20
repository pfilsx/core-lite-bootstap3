<?php


namespace core\bootstrap;

use core\components\AssetBundle;

class BootstrapAsset extends AssetBundle
{
    public static function cssAssets()
    {
        return [
            '@vendor/pfilsx/core-lite-bootstrap3/assets/bootstrap.min.css' => static::POS_HEAD
        ];
    }

    public static function jsAssets()
    {
        return [
            '@vendor/pfilsx/core-lite-bootstrap3/assets/bootstrap.min.js' => static::POS_BODY_END
        ];
    }

    public static function fonts(){
        return [
            '@vendor/pfilsx/core-lite-bootstrap3/assets/fonts'
        ];
    }
}