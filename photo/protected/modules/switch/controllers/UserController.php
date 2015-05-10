<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/13
 * Time: 18:26
 * version: 用户情况
 */

class UserController extends Controller
{
    /**
     * 个人资料首页
     */
    public function actionIndex()
    {
        $this->setPageTitle('个人详情');
        $uid = Yii::app()->session['user_id'];
        $user = User::model()->findByPk($uid);

        $criteria = new CDbCriteria();
        $criteria->condition = "uid = '{$uid}'";
        $num = Dynamic::model()->count($criteria);
        $criteria->limit = 1;
        $criteria->order = "id desc";
        $dynamic = Dynamic::model()->find($criteria);

        $this->render('index', array('user'=>$user, 'num'=>$num, 'dynamic'=>$dynamic));
    }

    /**
     * @author: asif<11562310983@qq.com>
     * @date: 2015-04-13
     * @params: $uid
     */
    public function actionGetUserInfo()
    {
        $uid = Yii::app()->request->getParam('uid');
        $to_uid = Yii::app()->request->getParam('to_uid');

        //uid, to_uid不能为空
        if(!isset($uid) || empty($uid) || !isset($to_uid) || empty($to_uid))
        {
            Common::json_return(-1, "uid和to_uid不能为空", array());
        }

        //自己看自己
        if($uid == $to_uid)
        {
            $user = User::model()->findByPk($uid);
            Common::json_return();
        }

        //看别人的
        else
        {
            $user = User::model()->findByPk($to_uid);
        }

        Common::json_return(1, "success", array($user));
    }

    /**
     * @author: asif<1156210983@qq.com>
     * @date: 2015-04-13
     * @version: 修改个人信息
     * @prarm: 要修改的参数
     */
    public function actionModifyUser()
    {
        $uid = Yii::app()->request->getParam('uid');
        $nickname = Yii::app()->request->getParam('nickname');
        $sex = Yii::app()->request->getParam("sex");
        $birthday = Yii::app()->request->getParam('birthday');
        $now = date("Y-m-d H:i:s", time());

        //找到这个用户
        $user = User::model()->findByPk($uid);
        if($user)
        {
            if(isset($nickname) && !empty($nickname))
            {
                $user->nickname = $nickname;
            }
            if(isset($sez) && !empty($sex))
            {
                $user->sex = $sex;
            }
            if(isset($birthday) && !empty($birthday))
            {
                $user->birthday = $birthday;
            }
            $user->update_time = $now;
            if($user->save())
            {
                Common::json_return(1, "success", array());
            }
            else
            {
                Common::json_return(-1, "修改失败", array());
            }
        }
        else
        {
            Common::json_return(-1, "没有这个用户", array());
        }
    }

    public function actionModifyPassword()
    {
        $this->setPageTitle('修改密码');
        $this->render("password");
    }
}