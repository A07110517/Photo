<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/10
 * Time: 21:09
 * version: 公用方法
 */

class Common
{
    /**
     * @param int $return_code
     * @param string $msg
     * @param array $data
     * @version: 返回json形式的数据
     */
    public static function json_return($return_code = 0, $msg = '', $data = array())
    {
        $response = array('result' => $return_code, 'msg'=> $msg, 'data' => $data);
        echo json_encode($response);
        Yii::app()->end();
    }

    /**
     * @param $uid
     * @param $files
     * @param $path
     * @param $key
     * @return int
     * @version: 上传文件到服务器
     */
    public static function uploadFile($uid, $files, $path, $key)
    {
        $file_name = substr(md5($uid.'_avatar_'.time()), 8, 16);
        $dir_md5 = md5($uid);
        $dir1 = substr($dir_md5, 0, 2);
        $dir2 = substr($dir_md5, 2, 2);

        $save_path = $path.'/'.$dir1.'/'.$dir2.'/'.$file_name.'jpg';

        //存储类型
        $uptypes=array(
            'image/jpg',
            'image/jpeg',
            'image/gif',
            'image/png',
            'talk/amr',
            'video/mp4'
        );

        //上传文件大小限制, 单位BYTE
        $max_file_size=25000000;

        if(!is_uploaded_file($files[$key]['tmp_name']))
        {
            //文件不存在
            return -1;
        }

        $file = $files[$key];
        if($max_file_size < $file["size"])
        {
            //文件太大
            return -2;
        }
        if(!in_array($file["type"], $uptypes))
        {
            //文件类型不对
            return -3;
        }
        //建立文件存储的文件夹
        if(!file_exists($dirname = dirname($save_path)))
        {
            mkdir($dirname, 0777, true);
        }
        $filename=$file["tmp_name"];
        if(!move_uploaded_file ($filename, $save_path))
        {
            //复制失败
            return -4;
        }
        else
        {
            return $file_name;
        }
    }

    public static function getPath($uid, $type)
    {
        $dir_md5 = md5($uid);
        $dir1 = substr($dir_md5, 0, 2);
        $dir2 = substr($dir_md5, 2, 2);

        $path = "";
        if($type == "avatar")
        {
            $path = Yii::app()->params['avatarUrl'];
        }
        elseif($type == "dynamic")
        {
            $path = Yii::app()->params['photoUrl'];
        }

        $path .= $dir1.'/'.$dir2.'/';

        return $path;
    }
}