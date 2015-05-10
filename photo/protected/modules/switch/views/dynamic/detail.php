<div class="container-fluid" style="margin-top:150px;">
    <div class="row-fluid">
        <div class="span12">
            <img alt="400x300" src="<?php echo Common::getPath($dynamic->uid, 'dynamic').$dynamic->pic_path.".jpg"?>" />
            </br>
            <B><?php echo $nickname." 于 ".$dynamic->create_time."发布.";?></B></br>
            <table style="width: 600px">
                <tr><td></td></tr>
                <?php
                foreach($comment as $key=>$val) {
                    ?>
                    <tr>
                        <td><font color="blue"><?php $user=User::model()->findByPk($val->uid); echo $user->nickname."：";?></font><?php echo $val->content;?></td>
                        <td><font color="orange"><h6><?php echo $val->create_time;?></h6></font></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <form action="index.php?r=switch/comment/AddComment&id=<?php echo $dynamic->id;?>&to_uid=<?php echo $dynamic->uid;?>" method="post">
                <fieldset>
                    <legend>添加评论</legend>
                    <p>
                        <textarea name="content" style="width: 600px; height: 273px"></textarea>
                    </p>
                    <p>
                        <button class="btn" type="submit">评论</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/photo.css" />