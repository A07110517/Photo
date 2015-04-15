<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2015/4/14
 * Time: 15:28
 * Version: 日志
 */

class PhotoLog
{
    /**
     * @param $dir
     * @param $file
     * @param $data
     * @return int
     * @version: 写日志
     */
    public static function Write($dir, $file, $data)
    {
        $filename = $file ."_". date("Y-m-d") . ".log";
        $destfile = "/data0/log/".$dir ."/".$filename;
        $time = date("[Y-m-d H:i:s]");
        $content = $time." ".$data."\n";
        if(!file_exists($dirname = dirname($destfile)))
        {
            mkdir($dirname, 0777);
        }
        if(file_exists($destfile))
        {
            chmod($destfile, 0777);
        }
        $fp = fopen($destfile, 'a+');
        if($fp)
        {
            $r = @fwrite($fp, $content);
            fclose($fp);
            chmod($destfile, 0777);
            return $r;
        }

        return -1;
    }
}