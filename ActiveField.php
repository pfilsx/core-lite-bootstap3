<?php


namespace core\bootstrap;

use core\helpers\ArrayHelper;
use core\web\Html;

class ActiveField extends \core\widgets\activeform\ActiveField
{
    private $_groupOptions = [];

    protected function defaultInput($type, $options = []){
        $options = ArrayHelper::merge_recursive($options, ['class' => 'form-control']);
        return parent::defaultInput($type, $options);
    }


    public function checkbox($options = [], $enclosedByLabel = true) {
        $this->_groupOptions['class'] = 'checkbox';
        return parent::checkbox($options, $enclosedByLabel);
    }

    public function radio($options = [], $enclosedByLabel = true) {
        $this->_groupOptions['class'] = 'radio';
        return parent::radio($options, $enclosedByLabel);
    }

    public function select($items, $options = []){
        $options = ArrayHelper::merge_recursive($options, ['class' => 'form-control']);
        return parent::select($items, $options);
    }

    public function textarea($options = [])
    {
        $options = ArrayHelper::merge_recursive($options, ['class' => 'form-control']);
        return parent::textarea($options);
    }

    public function fileInput($options = [])
    {
        $options = ArrayHelper::merge_recursive($options, ['class' => 'form-control']);
        return parent::fileInput($options);
    }

    public function label($text, $options = [])
    {
        $this->_label = $text;
        $this->_labelOptions = ArrayHelper::merge_recursive($options, ['class' => 'control-label']);
        return $this;
    }

    protected function render()
    {
        $html = Html::startTag('div', ArrayHelper::merge_recursive([
            'class' => 'crl-active-form-group form-group'.($this->_model->hasError($this->_attribute) ? ' has-error' : '')
        ], $this->_groupOptions));
        if ($this->_label == null) {
            $this->label($this->_model->getAttributeLabel($this->_attribute));
        }
        if ($this->_enclosedByLabel){
            $html .= Html::startTag('label', array_merge($this->_labelOptions, [
                'for' => $this->getFieldName()
            ]));
            $html .= implode(PHP_EOL, $this->_elements);
            $html .= $this->_label.Html::endTag('label');
        } else {
            $html .= Html::label($this->_label, $this->getFieldName(), $this->_labelOptions);
            $html .= implode(PHP_EOL, $this->_elements);
        }
        $html .= Html::tag('span', ($this->_model->hasError($this->_attribute)
            ? $this->_model->getErrors($this->_attribute)[0] : null),
            ['class' => $this->_attribute.'_help help-block']);
        $html .= Html::endTag('div');

        return $html;
    }
}