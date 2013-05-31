<?php
class JobController extends Controller {
    public function filters()   {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()   {
        return array(
            array('allow', // allow authenticated users to access all actions
                  'roles'=>array('2'),
            ),
            array('allow',
                  'actions'=>array('apply'),
                  'users'=>array('@'),  
                    
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
        
       $this->render('manageJobs');
    }
    /*Approve job post only if company is approved ( status = 1)
     * else redirect to not approved
     */
    public function actionSubmitJob() {
       $model = new JobForm;
       if (isset($_POST['JobForm'])) {
                       $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
                       $model->attributes = $_POST['JobForm'];
                       if ($company ->status == 1) {
                            if ($model->validate()) {
                                      $record = new job;
                                      $record->title = $model->title;
                                      $record->description = $model->description;
                                      $record->type = $model->type;
                                      $record->salary = $model->salary;
                                      $record->location = $model->location;
                                      $record->category = $model->category;
                                      $record->CID = $company->CID;
                                      if ($record->save()) {      
                                            $JID=$record->JID;           //redirect  
                                            $this->redirect(array('job/premium','JID' => $JID));
                                       }
                            }   
                       }
                       else
                            $this->redirect(array('site/page', 'view'=>'notApproved'));
       }
       $this->render('submitJob', array('model' => $model));
    }
    //Not completed
    //Upgrade job posting to premium
    
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
        $job = job::model()->find('JID=:JID', array('JID' => $JID));
        $CID=$job->CID;
        $company = company::model()->find('CID=:CID', array('CID'=> $CID));
        $this->render('job', array('job' => $job,
                                   'company'=>$company) );
    }
    
    
    public function deleteJob($JID) {
        $job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>Yii::app()->user->getID()));
        $job->delete();
       
    } 
  
    public function actionJobList()  {
        $CID = Yii::app()->user->getID();
        //$jobList=job::model()->findAll('CID=:CID',array('CID'=>$CID,
        $jobList = new Job();                                         
        $this-> render('jobList', array('jobList' =>$jobList));
    }

   
    
}
?>
