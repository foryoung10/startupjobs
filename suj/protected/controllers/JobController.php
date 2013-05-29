<?php
class JobController extends Controller {
     public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                  'roles'=>array('2'),
           ),
            array('allow',
                  'actions'=>array('apply'),
                  'users'=>array('@'),  
//'roles'=>array('0','1','2'),  
                    
                ),
            array('allow',
                  'actions'=>array('job'),
                  'users'=>array('*'),
                ),
           
            array('deny',
                  'users'=>array('*')),
        );
    }
   public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }
    
    public function actionManageJobs() {
        $criteria = new CDbCriteria;
        $criteria->condition='ID=:ID';
        $criteria->params=array(':ID'=>Yii::app()->user->getID());
        $jobs=job::model()->with('company')->findAll($criteria);
        
        $this->render('manageJobs',array('jobs'=>$jobs));
    }
   public function actionSubmitJob() {
       $model = new JobForm;
       $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
       if (isset($_POST['JobForm'])) {
                       $model->attributes = $_POST['JobForm'];
                       if ($model->validate()) {
                                      $record = new job;
                                      $record->title = $model->title;
                                      $record->description = $model->description;
                                      $record->type = $model->type;
                                      $record->salary = $model->salary;
                                      $record->location = $model->location;
                                      $record->CID = $company->CID;
                                      // increment job count by one
                                      if ($record->save()) {      
                                            $JID=$record->JID;           //redirect  
                                            $this->redirect(array('job/premium','JID' => $JID));
                                       }
                        }   
        }
        
        $this->render('submitJob', array('model' => $model));
    }
    
    public function actionPremium($JID) {
        
       if(true) {
           $job = job::model()->find('JID=:JID',  array(':JID' => $JID, ));
           $job->premium = 1;
           $job->save();
       } 
       
        $this->render('premium');
    }
    
    
    public function actionUpdate($JID) {
        $ID = Yii::app()->user->getID();
        $model = new JobForm;
        //$job = job::model()->with('company')->find('JID=:JID' ,  array(':JID' => $JID, ));
       
       //  if (!($favourite = favourite::model()->find('profileID=:profileID&&friendID=:friendID', array(':profileID' => $model1->profileID,
         //   ':friendID' => $model1->friendID))))
       
        //need to check company id as well...
        //potential error
        $job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>$ID));
        //CActiveRecord for old one
        if ($job !=null)
            $model->attributes = $job->attributes;
        //$model->about = str_replace('<br />', "", $company->about);
        if (isset($_POST['JobForm'])) {
                    $model->attributes = $_POST['JobForm'];
                    $job->title = $model->title;
                    $job->description = $model->description;
                    $job->type = $model->type;
                    $job->salary = $model->salary;
                    $job->modified = new CDbExpression('NOW()');
                    if ($job->save()) {      
                                       //redirect  
                                       $this->redirect(array('job/job','JID' => $JID));
                                     }
                    
        }             
        $this->render('update', array('model' => $model, 
                                      'job' => $job, ));
    }
    
    public function actionJob($JID) {
        // $ID=$id;
        $job = job::model()->find('JID=:JID', array('JID' => $JID));
        $CID=$job->CID;
        $company = company::model()->find('CID=:CID', array('CID'=> $CID));
        $this->render('job', array('job' => $job,
                                   'company'=>$company) );
    }
    
    
    public function deleteJob($JID) {
        $job = job::model()->with('company')->find('JID=:JID' AND 'ID=:ID',  array(':JID' => $JID, ':ID'=>$ID));
        $job->delete();
        //Yii::app()->getRequest()->redirect(Yii::app()->request->baseUrl . '/index.php/item/viewCollection');

    } 
  
    public function actionJobList()  {
        $CID = Yii::app()->user->getID();
        //$jobList=job::model()->findAll('CID=:CID',array('CID'=>$CID,
        $jobList = new Job();                                         
        $this-> render('jobList', array('jobList' =>$jobList));
    }

    public function actionApply($JID) {
        $ID = Yii::app()->user->getID();
        // user not logged in
        
        //already applied
        $check = application::model()->find(':ID=ID&&:JID=JID',array(':ID'=>$ID,':JID'=>$JID));
        if ($check!=null)   {
            $this->redirect(array('site/page', 'view'=>'error'));
        }
        else    {    
            $application = new application;
            $job = job::model()->find('JID=:JID', array('JID' => $JID));
            $application->ID =$ID;
            $application->JID = $JID;
            $application->CID = $job ->CID; 
        // send resume to employer 
        //$user = user::model()->find(':ID=ID', array(':ID'=>$ID)); 
            if ($application->save()) {      
                         // array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                                                            
                            $this->redirect(array('site/page', 'view'=>'success'));
            }
        }
        
    }
    
}
    

?>
