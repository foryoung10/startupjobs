<?php
class JobController extends Controller {

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
                                      $record->CID = $company->CID;
                                      // increment job count by one
                                      if ($record->save()) {      
                                            $JID=$record->JID;           //redirect  
                                            $this->redirect(array('job/job','JID' => $JID));
                                       }
                        }   
        }
        
        $this->render('submitJob', array('model' => $model));
    }
    
    public function actionUpdate($JID) {
        $ID = Yii::app()->user->getID();
        $model = new JobForm;
        $job = job::model()->with('company')->find('JID=:JID' AND 'ID=:ID',  array(':JID' => $JID, ':ID'=>$ID));
        //CActiveRecord for old one
        $model->attributes = $job->attributes;
  //    $CForm->about = str_replace('<br />', "", $company->about);
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
        $PAGE_SIZE = 10; 
        $model=new job();
        $criteria=new CDbCriteria;
        //$criteria->order = 'created DESC';
        $type = "Full-Time";
        $criteria->condition='type=:type';
        $criteria->params=array(':type'=>$type);
        $total = $model->count($criteria);
        $pages=new CPagination($total);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $list = $model->findAll($criteria);
        //$criteria=new CDbCriteria;
        //$posts=job::model()->with('company')->findAll($criteria);
        $this->render('fullTime',array('list'=>$list,
                                           'pages'=>$pages,));
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
       
    public function actionJobList()  {
        $CID = Yii::app()->user->getID();
        //$jobList=job::model()->findAll('CID=:CID',array('CID'=>$CID,
        $jobList = new Job();                                         
        $this-> render('jobList', array('jobList' =>$jobList));
    }
}
    

?>
