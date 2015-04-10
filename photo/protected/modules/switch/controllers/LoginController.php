<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/10
 * Time: 20:29
 * version: 登录控制器
 */

class LoginController extends Controller
{
    /**
     * @since: 2015-04-10
     * @author: asif<1156210983@qq.com>
     * @version: 用户登录接口
     * @params: $username-用户名; $password-密码
     * @return: true or false
     */
    public function actionLogin()
    {
        $username = Yii::app()->request->getParam('username');
        $password = Yii::app()->request->getParam('password');
        $password = md5($password);

        //username或者password有一个为空就跑出异常
        if(!isset($username) || empty($username) || !isset($password) || empty($password))
        {
            Common::json_return(-1, "用户名或密码为空", array());
        }
    }
}