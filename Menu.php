<?php


namespace core\bootstrap;


use core\helpers\ArrayHelper;
use core\web\Html;

class Menu extends \core\widgets\menu\Menu
{
    protected function renderHorizontal()
    {
        echo Html::startTag('ul', ArrayHelper::merge_recursive($this->options, ['class' => 'nav nav-pills nav-justified']));
        foreach ($this->items as $item){
            if (!isset($item['label']) || !isset($item['url'])){
                throw new \Exception('Invalid parameters passed to Menu::widget items');
            }
            echo Html::startTag('li', ArrayHelper::merge_recursive($this->itemOptions, [
                'class' => ($this->_currentUrl == $item['url'] || $this->_currentRoute == $item['url']
                    ? 'active'
                    : ''),
                'role' => 'presentation'
            ]));
            echo Html::tag('a', $item['label'], [
                'href' => $item['url']
            ]);
        }
        echo Html::endTag('ul');
    }
    protected function renderVertical()
    {
        echo Html::startTag('div', ArrayHelper::merge_recursive($this->options, ['class' => 'list-group']));
        foreach ($this->items as $item){
            if (!isset($item['label']) || !isset($item['url'])){
                throw new \Exception('Invalid parameters passed to Menu::widget items');
            }
            echo Html::tag('a', $item['label'], ArrayHelper::merge_recursive($this->itemOptions, [
                'class' => ($this->_currentUrl == $item['url'] || $this->_currentRoute == $item['url']
                    ? 'list-group-item active'
                    : 'list-group-item'),
                'href' => $item['url']
            ]));
        }
        echo Html::endTag('div');
    }
}