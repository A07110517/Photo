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
     * return: json
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

        //检测数据库里面是否有这个用户
        $criteria = new CDbCriteria();
        $criteria->condition = "nickname = '{$username}' or phone = '{$username}' or email = '{$username}' or uid = '{$username}'";
        $user = User::model()->find($criteria);

        //如果为空，报错
        if(!isset($user) || empty($user))
        {
            Common::json_return(-1, "没有这个用户", array());
        }

        //查看密码是否输入正确
        if($password != $user->password)
        {
            Common::json_return(-1, "密码错误", array());
        }

        //验证通过返回成功
        Common::json_return(0, "success", array($user));
    }
}