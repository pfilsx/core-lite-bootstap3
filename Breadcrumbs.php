<?php


namespace core\bootstrap;


use core\web\Html;

class Breadcrumbs extends \core\widgets\breadcrumbs\Breadcrumbs
{
    public function run()
    {
        ob_start();
        ob_implicit_flush(false);
        echo Html::startTag('ol', ['class' => 'crl-breadcrumb breadcrumb']);
        foreach ($this->_elements as $key => $url){
            echo "<li><a href=\"$url\">$key</a></li>";
        }
        echo Html::endTag('ol');
        return ob_get_clean();
    }
}