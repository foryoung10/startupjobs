<?php

class RegistrationController extends Controller {

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

    public function hashPassword($phrase) {
        
    }

    public function actionRegistration() {

        $model = new RegistrationForm;
       
        if (isset($_POST['RegistrationForm'])) {
              $model->attributes = $_POST['RegistrationForm'];
              if ($model->validate()) {       //generate activation key
               // $activationKey = mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
                // $model->activationKey= mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
                        $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $pwd = hash('sha512', $key . ($model->password));
                        $pwd = substr($pwd, 0, 100);
                        $record = new user;
                        // Save into employee
                        $record->username = $model->username;
                        $record->password = $pwd;
                        $record->name = $model->name;
                        $record->email = $model->email;
                        $record->role = 0;
                
               // $record->img_name = 'default';

                // $record->mailingAddress = $model->mailingAddress;
              //  $record->mailingAddress = nl2br($_POST['addressId']);

              //  $record->activationKey = $activationKey;
                        $record->save();
                        $this->redirect(array('site/page', 'about' => 'success'));
            }
        }
    
         $this->render('registration', array('model' => $model));
    }

    
    
       public function actionRegisterCompany() {
         
        $model = new CompanyForm;
        
        if (isset($_POST['CompanyForm'])) {
              $ID = Yii::app()->user->getID();
              $model->attributes = $_POST['CompanyForm'];
                     //generate activation ke
                $company = new company;
                  
                $company->ID = $ID;
                $company->address = $model->address;
                $company->contact = $model->contact;
                $company->cname = $model->cname;
                $company->about = nl2br($model->about);
                $company->cemail = $model->cemail;
                $company->status = 0;
                
                if ($company->save())   {
                    $uploadedFile=CUploadedFile::getInstance($model,'image');
                    if (!empty($uploadedFile)) {      
                          
                                  $fileName = "{$company->CID}-{$uploadedFile}";  // random number + file name
                                 $company->image = $fileName;
                     }              
                        if ($company->save())       
                            $uploadedFile->saveAs(Yii::app()->basepath.'/../images/company/'.$fileName);  // image will uplode to rootDirectory/banner    
                         }   
                    $user=user::model()->find(':ID=ID', array('ID'=>$ID));
                    $user-> role = 2;
                    $user->CID = $company->CID;
                    $user->save();
                
                    $approve = new approve; 
                    $approve->CID = $company->CID;
                    $approve->save();
                
                    $baseUrl = Yii::app()->request->baseUrl;
               
                    $this->redirect(array('company/company'));
                
               // $record->img_name = 'default';

                // $record->mailingAddress = $model->mailingAddress;
              //  $record->mailingAddress = nl2br($_POST['addressId']);

              //  $record->activationKey = $activationKey;
            }
        
    
         $this->render('register_company', array('model' => $model));
    }

    
    
    
    
}



/*
                $message = new YiiMailMessage;
                $baseUrl = Yii::app()->request->baseUrl;
                $serverPath = 'localhost/yii/uStyle';
                $body = "Hi <font type=\"bold\">" . $record->name . "</font><br>
                    <br>
                    Welcome to uStyle! Your account <font type=\"bold\">" . $record->username . "</font> has been registered.<br>
                        <br>
                        In order to ensure that you have received this confirmation, we ask that you follow the link below and confirm that this is in fact the correct email address.<br>
                        <br>
                        <a href=\"" . $serverPath . '/index.php/registration/verify?code=' . $activationKey . "\">Verify Your Email Here</a><br>
                        <br>
                        Accounts that have not been confirmed will be deactivated and removed from our system within 7 days, including all email addresses.<br> 
                        <br>
                        If you have NOT attempted to create an account at uStyle please ignore this email - it might have been sent because someone mistyped his/her own email address.<br>
                        THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                        <br>
                        -------------<br>
                        uStyle Team";


                $message->setBody(
                        $body
                        , 'text/html');
                $message->subject = "uStyle Account Verification";

                $message->addTo($model->email);
                $message->from = 'noreply@uStyle.com';
                Yii::app()->mail->send($message);

                $this->redirect(array('site/page', 'view' => 'success'));
            }
        }
        $this->render('registration', array('model' => $model));
    }

    
     public function actionForgetPassword() {
        $model = new forgetPassword;

        if (isset($_POST['forgetPassword'])) {
            $model->attributes = $_POST['forgetPassword'];

            if ($member = member::model()->find('email=:email', array('email' => $model->email))) {

                $pwd1 = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 6)), 0, 6);
                $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                $pwd = hash('sha512', $key . ($pwd1));
                $pwd = substr($pwd, 0, 100);
                $member->password = $pwd;
                $member->save();

                $message = new YiiMailMessage;
                $baseUrl = Yii::app()->request->baseUrl;
                $serverPath = 'localhost/yii/uStyle';
                $body = "Hi <font type=\"bold\">" . $member->name . "</font><br>
                    <br>
                    Your account <font type=\"bold\">" . $member->username . "</font>'s password has been reset.<br>
                        <br>
                        This is your new password : ".$pwd1."<br>
                        <br>
                        ------------------------------------------------------------------------<br>
                        THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                        ------------------------------------------------------------------------<br>
                        <br>
                        -------------<br>
                        uStyle Team";


                $message->setBody(
                        $body
                        , 'text/html');
                $message->subject = "uStyle Account Verification";

                $message->addTo($model->email);
                $message->from = 'noreply@uStyle.com';
                Yii::app()->mail->send($message);



                $this->redirect(array('site/page', 'view' => 'sentmail'));
            }
            $this->redirect(array('site/page', 'view' => 'emailNotFound'));
        }



        $this->render('forgetPassword', array('model' => $model));
    }

    public function actionVerify($code) {
        if ($member = member::model()->find('activationKey=:activationKey', array('activationKey' => $code))) {
            $member->activationKey = '0';
            if ($member->save())
                $this->redirect(array('site/page', 'view' => 'verify'));
        }
    }

    public function actionReSend($memberEmail) {
        $baseUrl = Yii::app()->request->baseUrl;
        $serverPath = 'localhost/yii/uStyle';
        $member = member::model()->find('email=:email', array('email' => $memberEmail));
        $message = new YiiMailMessage;
        $message->setBody("Hi $member->name!<br>
                        <br>You have requested to resend your activation key
                        <br>
                        <br>
                        Click on the link : 
                        <a href=\"" . $serverPath . '/index.php/registration/verify?code=' . $member->activationKey . "\">Verify Your Email Here</a><br>
                        <br>
                        If you did not make this request, ignore this email.
                        <br><br>
                        Regards,
                        <br> 
                        uStyle Team", 'text/html');
        $message->subject = "uStyle Activation Key";

        $message->addTo($member->email);
        $message->from = 'noreply@uStyle.com';
        Yii::app()->mail->send($message);
        $this->redirect(array('site/page', 'view' => 'resend'));
    }
*/

?>
