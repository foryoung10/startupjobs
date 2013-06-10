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

   
    public function actionBuy(){
 
        // set 
        $paymentInfo['Order']['theTotal'] = 10.00;
        $paymentInfo['Order']['description'] = "Some payment description here";
        $paymentInfo['Order']['quantity'] = '1';
 
        // call paypal 
        $result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo); 
        //Detect Errors 
        if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
            if(Yii::app()->Paypal->apiLive === true){
                //Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            }else{
                //Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }
            echo $error;
            Yii::app()->end();
 
        }else { 
            // send user to paypal 
            $token = urldecode($result["TOKEN"]); 
 
            $payPalURL = Yii::app()->Paypal->paypalUrl.$token; 
            $this->redirect($payPalURL); 
        }
    }
 
    public function actionConfirm()
    {
        $token = trim($_GET['token']);
        $payerId = trim($_GET['PayerID']);
 
 
 
        $result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
 
        $result['PAYERID'] = $payerId; 
        $result['TOKEN'] = $token; 
        $result['ORDERTOTAL'] = 0.00;
 
        //Detect errors 
        if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
            if(Yii::app()->Paypal->apiLive === true){
                //Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            }else{
                //Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }
            echo $error;
            Yii::app()->end();
        }else{ 
 
            $paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
            //Detect errors  
            if(!Yii::app()->Paypal->isCallSucceeded($paymentResult)){
                if(Yii::app()->Paypal->apiLive === true){
                    //Live mode basic error message
                    $error = 'We were unable to process your request. Please try again later';
                }else{
                    //Sandbox output the actual error message to dive in.
                    $error = $paymentResult['L_LONGMESSAGE0'];
                }
                echo $error;
                Yii::app()->end();
            }else{
                //payment was completed successfully
 
                $this->render('confirm');
            }
 
        }
    }
 
    public function actionCancel()
    {
        //The token of the cancelled payment typically used to cancel the payment within your application
        $token = $_GET['token'];
 
        $this->render('cancel');
    }
 
    public function actionDirectPayment(){ 
        $paymentInfo = array('Member'=> 
            array( 
                'first_name'=>'name_here', 
                'last_name'=>'lastName_here', 
                'billing_address'=>'address_here', 
                'billing_address2'=>'address2_here', 
                'billing_country'=>'country_here', 
                'billing_city'=>'city_here', 
                'billing_state'=>'state_here', 
                'billing_zip'=>'zip_here' 
            ), 
            'CreditCard'=> 
            array( 
                'card_number'=>'number_here', 
                'expiration_month'=>'month_here', 
                'expiration_year'=>'year_here', 
                'cv_code'=>'code_here' 
            ), 
            'Order'=> 
            array('theTotal'=>1.00) 
        ); 
 
       /* 
        * On Success, $result contains [AMT] [CURRENCYCODE] [AVSCODE] [CVV2MATCH]  
        * [TRANSACTIONID] [TIMESTAMP] [CORRELATIONID] [ACK] [VERSION] [BUILD] 
        *  
        * On Fail, $ result contains [AMT] [CURRENCYCODE] [TIMESTAMP] [CORRELATIONID]  
        * [ACK] [VERSION] [BUILD] [L_ERRORCODE0] [L_SHORTMESSAGE0] [L_LONGMESSAGE0]  
        * [L_SEVERITYCODE0]  
        */ 
 
        $result = Yii::app()->Paypal->DoDirectPayment($paymentInfo); 
 
        //Detect Errors 
        if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
            if(Yii::app()->Paypal->apiLive === true){
                //Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            }else{
                //Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }
            echo $error;
 
        }else { 
            //Payment was completed successfully, do the rest of your stuff
        }
 
        Yii::app()->end();
    } 

}
?>
