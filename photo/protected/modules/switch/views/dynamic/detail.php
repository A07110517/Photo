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
                        <td><a href="index.php?r=switch/user/index&uid=<?php echo $val->uid;?>"><font color="blue"><?php $user=User::model()->findByPk($val->uid); echo $user->nickname."：";?></font></a><?php echo $val->content;?></td>
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

<div class="page">
    <?php $this->widget('CLinkPager', array(
            'header'=>'',
            'firstPageLabel'=>'首页',
            'lastPageLabel'=>'末页',
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            'pages'=>'$pages',
            'maxButtonCount'=>10,
            'pages' => $pages
        )
    ); ?>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/photo.css" />