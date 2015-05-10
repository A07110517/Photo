<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->setPageTitle('Photo Show');
		$uid = Yii::app()->request->getParam('uid');

		$criteria = new CDbCriteria();
		if(!isset($uid) || empty($uid))
		{
			$criteria->condition = "is_deleted = 0";
		}
		else
		{
			$criteria->condition = "uid = '{$uid}' && is_deleted = 0";
		}
		$criteria->order = "update_time desc";
		$criteria->limit = 6;

		//分页start
		$count = Dynamic::model()->count($criteria);

		$pager = new CPagination($count);
		$pager->pageSize = 6; //每页显示的行数
		$pager->applyLimit($criteria);
		if($uid)
		{
			$pager->params = array("uid"=>$uid);
		}
		//分页end

		$criteria->offset = $pager->getOffset();
		$dynamic = Dynamic::model()->findAll($criteria);

		//返回的结果
		$res = array();
		foreach($dynamic as $key=>$val)
		{
			$user = User::model()->findByPk($val->uid);
			$res[$key]['id'] = $val->id;
			$res[$key]['nickname'] = $user->nickname;
			$res[$key]['sex'] = $user->sex;
			$res[$key]['pic_path'] = Common::getPath($user->uid, "dynamic").$val->pic_path.".jpg";
			$res[$key]['content'] = $val->content;
			$res[$key]['praise'] = $val->praise_num;
			$res[$key]['boo'] = $val->boo_num;
		}
		$this->render('index', array("pages"=>$pager, 'list'=>$dynamic, 'dynamic'=>$res));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}