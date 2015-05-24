<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/15
 * Time: 15:34
 * Version: 用户对动态的评论和点赞
 */

class CommentController extends Controller
{
    /**
     * @author: asif<1156210983@qq.com>
     * @version: 发布评论
     * @date: 2015-04-15
     */
    public function actionAddComment()
    {
        $did = Yii::app()->request->getParam('id');
        $to_uid = Yii::app()->request->getParam('to_uid');
        $uid = Yii::app()->session['user_id'];
        $content = Yii::app()->request->getParam('content');
        $now = date("Y-m-d H:i:s", time());

        if(!isset($did) || empty($did) || !isset($uid) || empty($uid) || !isset($content) || empty($content))
        {
            $result = "参数不能为空";
            $this->redirect(array('dynamic/detail', 'id'=>$did, 'result'=>$result));
            Yii::app()->end();
            //Common::json_return(-1, "参数不能为空", array());
        }

        $comment = new Comment();
        $comment->uid = $uid;
        $comment->did = $did;
        $comment->to_uid = $to_uid;
        $comment->content = $content;
        $comment->create_time = $now;

        if($comment->save())
        {
            $dynamic = Dynamic::model()->findByPk($did);
            if($dynamic)
            {
                $dynamic->update_time = $now;
                $dynamic->save();
            }
            else
            {
                $result = "没有找到您要评论的动态";
                $this->redirect(array('dynamic/detail', 'id'=>$did, 'result'=>$result));
                Yii::app()->end();
                //Common::json_return(-1, "没有找到您要评论的动态", array());
            }
            $this->redirect(array('dynamic/detail', 'id'=>$did));
        }
        else
        {
            $result = "发布失败";
            $this->redirect(array('dynamic/detail', 'id'=>$did, 'result'=>$result));
            Yii::app()->end();
            //Common::json_return(-1, "发布失败", array());
        }
    }

    /**
     * @author: asif<1156210983@qq.com>
     * @version: 删除评论
     * @date: 2015-04-15
     */
    public function actionDelComment()
    {
        $id = Yii::app()->request->getParam('id');
        $comment = Comment::model()->findByPk($id);

        if($comment)
        {
            $comment->is_deleted = 1;
            if($comment->save())
            {
                $this->redirect(array('dynamic/detail', 'id'=>$comment->did));
            }
            else
            {
                Common::json_return(-1, "删除失败", array());
            }
        }
        else
        {
            Common::json_return(-1, "没有这条评论", array());
        }
    }
}