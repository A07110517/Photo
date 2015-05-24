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
     * 注册首页
     */
    public function actionIndex()
    {
        $this->setPageTitle('注册');
        $this->render('index');
    }

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
            $result = "用户名，密码，手机号，邮箱都不能为空";
            $this->render('index', array('result'=>$result));
            Yii::app()->end();
            //Common::json_return(-1, "用户名，密码，手机号，邮箱都不能为空", array());
        }

        //两次密码是否一样
        if($password != $password_compire)
        {
            $result = "两次密码输入不一致";
            $this->render('index', array('result'=>$result));
            Yii::app()->end();
            //Common::json_return(-1, "两次密码输入不一致", array());
        }

        //该用户是否已经被注册
        $criteria = new CDbCriteria();
        $criteria->condition = "phone = '{$phone}' or email = '{$email}' or nickname = '{$nickname}'";
        $is_register = User::model()->find($criteria);
        if($is_register)
        {
            $result = "该用户已经被注册";
            $this->render('index', array('result'=>$result));
            Yii::app()->end();
            //Common::json_return(-1, "该用户已经被注册", array());
        }

        //手机号是不是合法
        if(!preg_match("/1[3458]{1}\d{9}$/",$phone))
        {
            $result = "手机号不合法";
            $this->render('index', array('result'=>$result));
            Yii::app()->end();
        }

        //判断邮箱是不是合法
        if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $email))
        {
            $result = "邮箱不合法";
            $this->render('index', array('result'=>$result));
            Yii::app()->end();
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
        $user->last_login_time = $now;
        $user->reg_time = $now;

        if($user->save())
        {
            //存入session
            Yii::app()->session['user_name'] = $nickname;
            Yii::app()->session['user_id'] = $user->attributes['uid'];
            Yii::app()->session['user_role'] = 1;
            $this->redirect("index.php");
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
        $this->setPageTitle('修改密码');
        $uid = Yii::app()->session['user_id'];
        $oldpassword = Yii::app()->request->getParam('oldpassword');
        $password = Yii::app()->request->getParam('password');
        $password_compire = Yii::app()->request->getParam('password_compire');

        //用户名和密码不能为空
        if(!isset($uid) || empty($uid) || !isset($oldpassword) || empty($oldpassword) || !isset($password) || empty($password))
        {
            $result = "输入不能为空";
            $this->render('../user/password', array('result'=>$result));
            Yii::app()->end();
            //Common::json_return(-1, "用户id密码不能为空", array());
        }

        //两次输入的密码必须一致
        if($password != $password_compire)
        {
            $result = "两次输入的密码不一致";
            $this->render('../user/password', array('result'=>$result));
            Yii::app()->end();
            //Common::json_return(-1, "两次输入的密码不一致", array());
        }

        $oldpassword = md5($oldpassword);
        $password = md5($password);
        $user = User::model()->findByPk($uid);
        if($user->password != $oldpassword)
        {
            $result = "原密码错误";
            $this->render('../user/password', array('result'=>$result));
            Yii::app()->end();
            //Common::json_return(-1, "原密码错误", array());
        }

        $user->password = $password;
        if($user->save())
        {
            $result = "<script>
                alert('修改成功');
                </script>";
            $this->render('../user/password', array('result'=>$result));
        }
        else
        {
            Common::json_return(-1, "修改失败", array());
        }
    }
}