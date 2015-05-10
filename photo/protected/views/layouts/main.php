<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/js/Datepicker/calendar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/dist/css/bootstrap.css" />
	<link href="<?php echo Yii::app()->params['bootstrapUrl']; ?>bootstrap-combined.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->params['bootstrapUrl']; ?>layoutit.css" rel="stylesheet">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/photo.js"></script>
</head>

<body>
<style type="text/css">
	body {
		background-size: cover;
		background-repeat: no-repeat;
		background-color: #d3d3d3;
		background-image: url(../images/body.jpg);
		margin: 0 80px;
	}
	.thumbnail .caption {
		padding: 9px;
		color: #555555;
		height: 448px;
	}
	.thumbnail a>img{
		width:250px;
		height:300px;
	}
	p {
		margin: 10px 26px;
	}
</style>

<?php
	$user_name = Yii::app()->session['user_name'];
	$user_role = Yii::app()->session['user_role'];
?>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button><a class="navbar-brand" href="/index.php"><img src="../images/title.png"></a>
<div id="w0-collapse" class="collapse navbar-collapse">
	<ul id="w1" class="navbar-nav navbar-right nav">
		<li class="active"><a href="/index.php" style="color:#d3b663">首页</a></li>
		<li><a href="index.php?r=switch/Dynamic/Index" style="color:#d3b663">发布动态</a></li>
		<li>
			<?php if($user_name == "") { ?>
				<a href="index.php?r=switch/Login/Index" style="color:#d3b663">登录</a>
			<?php
			}
			else
			{
			?>
			<a href="index.php?r=switch/user/Index" style="color:#d3b663"><?php echo $user_name;?></a>
		</li>
				<li>
					<a href="index.php?r=switch/login/logout" style="color:#d3b663">退出</a>
				</li>
			<?php }?>
</li></ul></div>
<p class="font">&nbsp;</p>
<div class="container-fluid">

	<?php echo $content; ?>

	<div id="footer" style="color:#67ff4f">
		Copyright &copy; <?php echo date('Y'); ?> by Yadong Wu.<br/>
		All Rights Reserved.<br/>
		Email:1156210983@qq.com
	</div><!-- footer -->

</div>
</body>
</html>