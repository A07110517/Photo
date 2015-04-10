<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/10
 * Time: 21:09
 * version: 公用方法
 */

class Common
{
    public static function json_return($return_code = 0, $msg = '', $data = array())
    {
        $response = array('result' => $return_code, 'msg'=> $msg, 'data' => $data);
        echo json_encode($response);
        Yii::app()->end();
    }
}