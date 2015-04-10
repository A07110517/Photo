<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/10
 * Time: 20:37
 * version: 动态表
 */

class Dynamic extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'dynamic';
    }
}