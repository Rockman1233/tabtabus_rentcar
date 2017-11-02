<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 01.11.17
 * Time: 9:38
 */
class View
{

    private $aData = [];
    private $template;

    public function __construct($template)
    {
        $this->template = $template;
    }


    function addData($sName, $Value){
        $this->aData[$sName] = $Value;
    }

    function generate()
    {
        echo '<br>';
        print_r($this->aData);
        foreach ($this->aData as $sName => $value) {
        }
        include $this->template;
    }

    function generateIn()
    {
        echo '<br>';
        foreach ($this->aData as $sName => $value) {
           /* echo '<pre>';
            print_r($value);
            echo '</pre>'; */
        }
        include $this->aData['temp'];
    }
}