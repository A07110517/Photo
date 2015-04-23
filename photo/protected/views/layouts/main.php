<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

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

<!--<div class="container" id="page">-->
<!---->
<!--	<div id="header">-->
<!--		<div id="logo">--><?php //echo CHtml::encode(Yii::app()->name); ?><!--</div>-->
<!--	</div><!-- header -->-->
<!---->
<!--	<div id="mainmenu">-->
<!--		--><?php //$this->widget('zii.widgets.CMenu',array(
//			'items'=>array(
//				array('label'=>'Home', 'url'=>array('/site/index')),
//				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>'Contact', 'url'=>array('/site/contact')),
//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
//			),
//		)); ?>
<!--	</div><!-- mainmenu -->-->
<!--	--><?php //if(isset($this->breadcrumbs)):?>
<!--		--><?php //$this->widget('zii.widgets.CBreadcrumbs', array(
//			'links'=>$this->breadcrumbs,
//		)); ?><!--<!-- breadcrumbs -->-->
<!--	--><?php //endif?>
<!---->
<!--	--><?php //echo $content; ?>
<!---->
<!--	<div id="footer">-->
<!--		Copyright &copy; --><?php //echo date('Y'); ?><!-- by My Company.<br/>-->
<!--		All Rights Reserved.<br/>-->
<!--		--><?php //echo Yii::powered(); ?>
<!--	</div><!-- footer -->-->
<!---->
<!--</div><!-- page -->-->
<style type="text/css">
	body {
		background-color:#d3d3d3;
	}
</style>
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
					<a href="#">首页</a>
				</li>
				<li>
					<a href="#">发布动态</a>
				</li>
				<li class="disabled">
					<a href="#">登录</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>