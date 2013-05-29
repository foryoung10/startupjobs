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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
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
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	 public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            $user =user::model()->find('username=:username', array('username' => $model->username));

            if ($model->validate()) {
               // if ($employee->activationKey != 0) {
                 //   $this->redirect(array('registration/resend?memberEmail='.$member->email));
                //} else {
                    $user ->last_login = new CDbExpression('NOW()');
                    $user->save();
                    $returnUrl = Yii::app()->user->returnUrl;
                    $model->login();
                    if($returnUrl == '/yii/suj/index.php')
                        $this->redirect(array('site/index'));
                    
                    Yii::app()->request->redirect($returnUrl);
                }
            }
        
        $this->render('login', array('model' => $model));
    }

      
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
          public function actionLatest() {
        $criteria = new CDbCriteria;
        $pageSize = 8;
        $total = job::model()->count();
        $pages = new CPagination($total);
        $pages->pageSize = 5;
        
        $count = job::model()->count($criteria);
        $pages->applyLimit($criteria);
        
        $jobs=job::model()->with('company')->findAll($criteria);
        
        $this->render('latest', array('jobs' => $jobs,
                                       'pages' => $pages,
                                       'count' => $count,
                                       'pageSize' => $pageSize));
      }
         
      public function actionFullTime() {
        $this->render('fullTime');
         //  $this->render('fullTime', array('posts' => $post));
           
       }
       //$item = product::model()->find('productID=:productID', array('productID' => $productID));
        
      public function actionPartTime() {
         $PAGE_SIZE = 10; 
         $model=new job();
         $criteria=new CDbCriteria;
         //  $criteria->order = 'created DESC';
         $type = "Part-Time";
         $criteria->condition='type=:type';
         $criteria->params=array(':type'=>$type);
         $total = $model->count($criteria);
         $pages=new CPagination($total);
         $pages->pageSize=10;
         $pages->applyLimit($criteria);
         $list = $model->findAll($criteria);
         //$criteria=new CDbCriteria;
         //$posts=job::model()->with('company')->findAll($criteria);
         $this->render('partTime',array('list'=>$list,
                                           'pages'=>$pages,));
       }
      public function actionTemporary() {
         $PAGE_SIZE = 10; 
         $model=new job();
         $criteria=new CDbCriteria;
         //  $criteria->order = 'created DESC';
         $type = "Temporary";
         $criteria->condition='type=:type';
         $criteria->params=array(':type'=>$type);
         $total = $model->count($criteria);
         $pages=new CPagination($total);
         $pages->pageSize=10;
         $pages->applyLimit($criteria);
         $list = $model->findAll($criteria);
         //$criteria=new CDbCriteria;
         //$posts=job::model()->with('company')->findAll($criteria);
         $this->render('temporary',array('list'=>$list,
                                           'pages'=>$pages,));
       }  
      public function actionInternship() {
         $PAGE_SIZE = 10; 
         $model=new job();
         $criteria=new CDbCriteria;
         //  $criteria->order = 'created DESC';
         $type = "Internship";
         $criteria->condition='type=:type';
         $criteria->params=array(':type'=>$type);
         $total = $model->count($criteria);
         $pages=new CPagination($total);
         $pages->pageSize=10;
         $pages->applyLimit($criteria);
         $list = $model->findAll($criteria);
         //$criteria=new CDbCriteria;
         //$posts=job::model()->with('company')->findAll($criteria);
         $this->render('partTime',array('list'=>$list,
                                        'pages'=>$pages,));
       }
     public function actionFreeLance() {
        $PAGE_SIZE = 10; 
        $model=new job();
        $criteria=new CDbCriteria;
        //  $criteria->order = 'created DESC';
        $type = "Freelance";
        $criteria->condition='type=:type';
        $criteria->params=array(':type'=>$type);
        $total = $model->count($criteria);
        $pages=new CPagination($total);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $list = $model->findAll($criteria);
        //$criteria=new CDbCriteria;
        //$posts=job::model()->with('company')->findAll($criteria);
        $this->render('freelance',array('list'=>$list,
                                        'pages'=>$pages,));
       }
       
        
        
        
}