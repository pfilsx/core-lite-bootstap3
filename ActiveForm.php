<?php


namespace core\bootstrap;

use core\helpers\ArrayHelper;
use core\web\Html;

class ActiveForm extends \core\widgets\activeform\ActiveForm
{
    public function init(){
        parent::init();
        BootstrapAsset::registerAssets();
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * @param \core\components\Model $model
     * @param string $attribute
     * @return \core\widgets\activeform\ActiveField || null
     * @throws \Exception
     */
    public function field($model, $attribute){

        if ($model->hasProperty($attribute)){
            $field = new ActiveField($model, $attribute, $this);
            $this->_fields[] = $field;
            return $field;
        }
        throw new \Exception("Trying to call field() on nonexistent attribute $attribute");
    }
}