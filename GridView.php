<?php


namespace core\bootstrap;


use core\web\Html;

class GridView extends \core\widgets\gridview\GridView
{
    protected function printHeader(){
        echo Html::startTag('table', ['class' => 'crl-grid table table-bordered table-responsive']);
        echo Html::startTag('thead');
        echo Html::startTag('tr');
        foreach ($this->columns as $column){
            echo $column->getHeader();
        }
        echo Html::endTag('tr');
        echo Html::endTag('thead');
    }
}