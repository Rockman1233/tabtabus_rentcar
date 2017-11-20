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
        /*echo '<pre>';
        print_r($Value);
        echo '</pre>';*/

    }

    function generate()
    {
        foreach ($this->aData as $sName => $value) {
        }
        include_once $this->template;
    }

    function generateIn()
    {
        /*echo '<pre>';
        print_r($this->aData);
        echo '</pre>'; */
        foreach ($this->aData as $sName => $value) {
            /*echo '<pre>';
            print_r($value);
            echo '</pre>';*/
        }
        include $this->aData['temp'];
    }
}