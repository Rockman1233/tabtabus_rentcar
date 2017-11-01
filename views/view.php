<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 01.11.17
 * Time: 9:38
 */
class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        include $template_view;
    }
}