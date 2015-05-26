<div class="container-fluid" style="margin-top:150px;">
    <div class="row-fluid">
        <div class="span12">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                    </td>
                    <td>
                        用户名：
                    </td>
                    <td>
                        <?php echo $user->nickname;?>
                    </td>
                </tr>
                <tr class="success">
                    <td>
                    </td>
                    <td>
                        联系电话：
                    </td>
                    <td>
                        <?php echo $user->phone;?>
                    </td>
                </tr>
                <tr class="error">
                    <td>
                    </td>
                    <td>
                        邮箱：
                    </td>
                    <td>
                        <?php echo $user->email;?>m
                    </td>
                </tr>
                <tr class="warning">
                    <td>
                    </td>
                    <td>
                        性别：
                    </td>
                    <td>
                        <?php if(!$user->sex) echo "女"; else echo "男";?>
                    </td>
                </tr>
                <tr class="info">
                    <td>
                    </td>
                    <td>
                        注册时间：
                    </td>
                    <td>
                        <?php echo $user->reg_time;?>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr class="success">
                    <td>
                    </td>
                    <td>
                        动态发布数量：
                    </td>
                    <td>
                        <a href="index.php?uid=<?php echo $user->uid;?>"><?php echo $num;?></a>
                    </td>
                </tr>
                <tr class="error">
                    <td>
                    </td>
                    <td>
                        生日：
                    </td>
                    <td>
                        <?php echo $user->birthday;?>
                    </td>
                </tr>
                <tr class="warning">
                    <td>
                    </td>
                    <td>
                        最后一条动态：
                    </td>
                    <td>
                        <?php
                        if($dynamic) {
                            ?>
                            <a href="index.php?r=switch/dynamic/detail&id=<?php echo $dynamic->id;?>"><?php echo $dynamic->content;?></a>
                        <?php
                        }
                        else
                        {
                            echo "无";
                        }
                        ?>
                    </td>
                </tr>
                <?php
                if($uid == $to_uid) {
                    ?>
                    <tr class="info">
                        <td>
                        </td>
                        <td>
                            <a href="index.php?r=switch/user/modifyPassword">修改密码</a>
                        </td>
                        <td>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>