<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Picture Show</title>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link href="<?php echo Yii::app()->params['bootstrapUrl']; ?>bootstrap-combined.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->params['bootstrapUrl']; ?>layoutit.css" rel="stylesheet">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<style type="text/css">
	body {
		background-color:#d3d3d3;
	}
</style>

<?php
	$user_name = Yii::app()->session['user_name'];
	$user_role = Yii::app()->session['user_role'];
?>

<p class="font">欢迎</p>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1 class="text-center" >

				<strong><strong><font color="#a52a2a">个人图片SHOW</font></strong></strong>
			</h1>
			<p>
				<em> <span class="marker">--<em>属于自己的图片展示系统</em></span></em>
			</p>

			<ul class="nav nav-tabs">
				<li class="active">
					<a href="index.php">首页</a>
				</li>
				<li>
					<a href="index.php?r=switch/Dynamic/Index">发布动态</a>
				</li>
				<li class="disabled">
					<?php if($user_name == "") { ?>
						<a href="index.php?r=switch/Login/Index">登录</a>
					<?php
					}
					else
					{
					?>
						<a href="#"><?php echo $user_name;?></a>
						</li>
						<li>
							<a href="index.php?r=switch/login/logout">退出</a>
						</li>
					<?php }?>
				</li>
			</ul>
		</div>
	</div>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Yadong Wu.<br/>
		All Rights Reserved.<br/>
		Email:1156210983@qq.com
	</div><!-- footer -->

</div>
</body>
</html>