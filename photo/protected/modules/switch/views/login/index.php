<div class="container-fluid" style="margin-top:150px;">
    <div class="row-fluid">
        <div class="span12">
            <form action="index.php?r=switch/login/login" method="post">
                <fieldset>
                    <legend>登陆</legend>
                    <p>
                        <font style="letter-spacing:1px" color="#FF0000">
                        <?php
                        if(isset($result) && !empty($result))
                            echo '*'.$result;
                        ?>
                        </font>
                    </p>
                    <p>
                        <label>用户名:</label>
                    </p>
                    <p>
                        <input type="text" name="username" placeholder="用户名/手机号"/>
                    </p>
                    <p>
                        <label>密码:</label>
                    </p>
                    <p>
                        <input type="password" name="password" />
                    </p><label class="checkbox"></label>
                    <p>
                        <button class="btn" type="submit">提交</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="index.php?r=switch/register/index"> <button class="btn" type="button">注册</button></a>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>