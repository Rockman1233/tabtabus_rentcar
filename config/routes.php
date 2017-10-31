<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 30.10.17
 * Time: 8:35
 */

return array(

    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'car' => 'car/index',
    'owner' => 'owner/index',
    'driver' => 'driver/index',
    "^products$" => "product/view",
    '' => '',
);