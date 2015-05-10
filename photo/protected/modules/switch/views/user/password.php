<div class="container-fluid" style="margin-top:150px;">
    <div class="row-fluid">
        <div class="span12">
            <form action="index.php?r=switch/register/modifyPassword" method="post">
                <fieldset>
                    <legend>修改密码</legend>
                    <p>
                        <label>原密码:</label>
                    </p>
                    <p>
                        <input type="password" name="oldpassword" />
                    </p>
                    <p>
                        <label>新密码:</label>
                    </p>
                    <p>
                        <input type="password" name="password" />
                    </p>
                    <p>
                        <label>新密码确认:</label>
                    </p>
                    <p>
                        <input type="password" name="password_compire" />
                    </p>
                    <label class="checkbox"></label>
                    <p>
                        <button class="btn" type="submit">修改</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>