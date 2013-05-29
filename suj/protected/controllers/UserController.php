<?php

class UserController extends Controller
{   public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
           
            array('allow', // allow authenticated users to access all actions
                 'roles'=>array('0'),
                ),
            array('allow',
                  'actions'=>array('depositResume'),
                  'users'=>array('@'),  
                 ),
            array('deny',
                  'users'=>array('*'),
                ),
           
           // array('deny'),
             //     'users'=>array('*'),
        );
    }
	public function actionIndex()
	{
		$this->render('index');
	}
        // 2 versions of resume are stored
        public function actionDepositResume()   {
             $model = new ResumeForm();
             $user=user::model()->find(':ID=ID', array('ID'=>Yii::app()->user->getID()));
             if (isset($_POST['ResumeForm'])) {
                    
                    $uploadedFile=CUploadedFile::getInstance($model,'resume');
                    $oldfilename = $user->resume;
                    $oldfilename2 = $user->resume2;
                    //resume -> uploaded resume, resume2 -> resume;
                    if (!empty($uploadedFile)) {      //uploaded file is not empty
                                    $fileName = str_replace(' ', '', "{$user->ID}-{$uploadedFile}");  // random number + file name
                                    $user->resume = $fileName;
                                    $user->resume2 = $oldfilename;
                         }          
                     if ($user->save())   {
                         if (!empty($uploadedFile)) {      
                                $uploadedFile->saveAs(Yii::app()->basepath.'/../resume/'.$fileName);  // image will uplode to rootDirectory/banner    
                                 if ($oldfilename != $fileName) {
                                        
                                        if ($oldfilename2 != null)  //delete the file
                                                unlink(Yii::app()->basePath . '/../resume/' . $oldfilename2);// image will uplode to rootDirectory/banner    
                                }            
                         }   
                     } 
                }
                $this->render('deposit', array('model'=>$model,
                                                    'user'=>$user));
        }
        
        public function actionApplication()
	{
		$this->render('application');
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}