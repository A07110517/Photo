<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/10
 * Time: 18:52
 */

class SwitchModule extends CWebModule
{
    public function init()
    {
        $this->setImport(array(
            'switch.models.*',
            'switch.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action))
        {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
        {
            return false;
        }
    }
}