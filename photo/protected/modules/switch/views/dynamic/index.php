<div class="container-fluid" style="margin-top:150px;">
    <div class="row-fluid">
        <div class="span12">
            <form action="index.php?r=switch/dynamic/addDynamic" enctype="multipart/form-data" method="post">
                <fieldset>
                    <p>
                        <legend>动态发布</legend>
                    </p>
                    <p>
                        <label>描述：</label>
                    </p>
                    <p>
                        <input type="text" name="content" maxlength="255"/>
                    </p>
                    <p>
                        <label>图片：<font style="letter-spacing:1px" color="#FF0000">*只允许上传jpg|png|bmp|pjpeg|gif格式的图片</font></label>
                    </p>
                    <p>
                        <input name="photo" type="file" /><br />
                    </p>
                    <p>
                        <button class="btn" type="submit">提交</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>