<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/11
 * Time: 11:24
 * version: 注册控制器
 */

class RegisterController extends Controller
{
    /**
     * @author: asif<1156210983@qq.com>
     * @date: 2015-04-11
     * @version: 用户这侧接口
     * @params: email,phone,password,password_compire,nickname,sex,birthday,avatar
     * return: true, false
     */
    public function actionRegister()
    {
        $password = Yii::app()->request->getParam('password');
        $password_compire = Yii::app()->request->getParam('password_compire');
        $phone = Yii::app()->request->getParam('phone');
        $email = Yii::app()->request->getParam('email');
        $nickname = Yii::app()->request->getParam('nickname');
        $sex = Yii::app()->request->getParam('sex');
        $birthday = Yii::app()->request->getParam('birthday');

        //必填项不能为空
        if(!isset($password) || empty($password) || !isset($phone) || empty($phone) || !isset($email) || empty($email) || !isset($nickname) || empty($nickname))
        {
            Common::json_return(-1, "用户名，密码，手机号，邮箱都不能为空", array());
        }

        //两次密码是否一样
        if($password != $password_compire)
        {
            Common::json_return(-1, "两次密码输入不一致", array());
        }

        //默认性别为女
        if(!isset($sex) || empty($sex))
        {
            $sex = 0;
        }
        //默认出生日期为1990年1月1号
        if(!isset($birthday) || empty($birthday))
        {
            $birthday = "1990-01-01";
        }
        $password = md5($password);

        $now = date("Y-m-d H:i:s", time());

        //插入该条信息
        $user = new User();
        $user->nickname = $nickname;
        $user->password = $password;
        $user->phone = $phone;
        $user->email = $email;
        $user->sex = $sex;
        $user->birthday = $birthday;
        $user->uodate_time = $now;
        $user->reg_time = $now;

        if($user->save())
        {
            Common::json_return(0, "注册成功", array($user));
        }
        else
        {
            Common::json_return(-1, "注册失败", array());
        }
    }

    /**
     * @author: asif<1156210983@qq.com>
     * @date: 2015-04-11
     * @version: 修改密码
     * @params: uid, password, password_compore
     */
    public function actionModifyPassword()
    {
        $uid = Yii::app()->request->getParam('uid');
        $oldpassword = Yii::app()->request->getParam('oldpassword');
        $password = Yii::app()->request->getParam('password');
        $password_compire = Yii::app()->request->getParam('password_compire');

        //用户名和密码不能为空
        if(!isset($uid) || empty($uid) || !isset($oldpassword) || empty($oldpassword) || !isset($password) || empty($password))
        {
            Common::json_return(-1, "用户id密码不能为空", array());
        }

        //两次输入的密码必须一致
        if($password != $password_compire)
        {
            Common::json_return(-1, "两次输入的密码不一致", array());
        }

        $oldpassword = md5($oldpassword);
        $password = md5($password);
        $user = User::model()->findByPk($uid);
        if($user->password != $oldpassword)
        {
            Common::json_return(-1, "原密码错误", array());
        }

        $user->password = $password;
        if($user->save())
        {
            Common::json_return(1, "修改成功", array());
        }
        else
        {
            Common::json_return(-1, "修改失败", array());
        }
    }
}