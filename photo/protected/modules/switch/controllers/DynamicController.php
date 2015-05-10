<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/14
 * Time: 18:24
 * Version: 动态相关
 */

class DynamicController extends Controller
{
    /**
     * 动态首页
     */
    public function actionIndex()
    {
        $uid = Yii::app()->session['user_id'];
        if(!isset($uid) || empty($uid))
        {
            $this->render('../login/index');
            Yii::app()->end();
        }

        $this->setPageTitle('发布动态');
        $this->render('index');
    }

    /**
     * @author: asif<1156210983@qq.com>
     * @version: 发布动态
     * @date: 2015-04-15
     */
    public function actionAddDynamic()
    {
        //判断是否登录
        $uid = Yii::app()->session['user_id'];
        if(!isset($uid) || empty($uid))
        {
            $this->render('../login/index');
            Yii::app()->end();
        }

        $content = Yii::app()->request->getParam('content');

        $now = date("Y-m-d H:i:s", time());

        $name = Yii::app()->params['dynamicPath'];

        $path = Common::uploadFile($uid, $_FILES, $name, 'photo');

        //将这一条数据插入到数据库中
        $dynamic = new Dynamic();
        $dynamic->uid = $uid;
        $dynamic->content = $content;
        $dynamic->pic_path = $path;
        $dynamic->create_time = $now;
        $dynamic->update_time = $now;

        if($dynamic->save())
        {
            $this->redirect("index.php");
        }
        else
        {
            Common::json_return(-1, "发布失败", array());
        }
    }

    /**
     * @author: asif<1156210983@qq.com>
     * @version: 删除动态
     * @date: 2015-04-15
     */
    public function actionDelDynamic()
    {
        $id = Yii::app()->request->getParam('id');
        $dynamic = Dynamic::model()->findByPk($id);

        if($dynamic)
        {
            $dynamic->is_deleted = 1;
            if($dynamic->save())
            {
                $this->redirect("index.php");
            }
            else
            {
                Common::json_return(-1, "删除失败", array());
            }
        }
        else
        {
            Common::json_return(-1, "没有这条动态", array());
        }
    }

    /**
     * 点赞
     */
    public function actionPraise()
    {
        $id = Yii::app()->request->getParam('id');
        $dynamic = Dynamic::model()->findByPk($id);
        if(isset($dynamic) && !empty($dynamic))
        {
            $dynamic->praise_num++;
            $dynamic->save();
        }
        $this->redirect("index.php");
    }

    /**
     * 点踩
     */
    public function actionBoo()
    {
        $id = Yii::app()->request->getParam('id');
        $dynamic = Dynamic::model()->findByPk($id);
        if(isset($dynamic) && !empty($dynamic))
        {
            $dynamic->boo_num++;
            $dynamic->save();
        }
        $this->redirect("index.php");
    }

    public function actionDetail()
    {
        $this->setPageTitle('动态详情');
        $id = Yii::app()->request->getParam('id');

        $dynamic = Dynamic::model()->findByPk($id);
        if(isset($dynamic) && !empty($dynamic))
        {
            $user = User::model()->findByPk($dynamic->uid);
            $criteria = new CDbCriteria();
            $criteria->condition = "did = '{$id}' and is_deleted=0";
            $comment = Comment::model()->findAll($criteria);

            $this->render("detail", array('dynamic'=>$dynamic, 'comment'=>$comment, 'nickname'=>$user->nickname));
        }
        else
        {
            $this->redirect("index.php");
        }
    }
}