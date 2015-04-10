<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/10
 * Time: 20:38
 * version: 评论表
 */

class Comment extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'comment';
    }
}