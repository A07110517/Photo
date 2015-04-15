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
     * @author: asif<1156210983@qq.com>
     * @version: 发布动态
     * @date: 2015-04-15
     */
    public function actionAddDynamic()
    {
        $uid = Yii::app()->request->getParam('uid');
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
            Common::json_return(1, "发布成功", array());
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
                Common::json_return(1, "删除成功", array());
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
}