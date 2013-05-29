<?php

class CompanyController extends Controller  {   
    public function filters(){
        return array( 'accessControl' ); 
    }
 
    public function accessRules() {
        return array(
             array('allow', // allow only company accounts to access all actions
                  'roles'=>array('2'),
           ),
            array('allow',  // allow all users to view company account
                  'actions'=>array('view'),
                  'users'=>array('*'),
                ),
            array('deny',
                'users'=>array('*')),
        );
    }
 
  
           
    public function actionCompany() {
        $ID = Yii::app()->user->getID();
        $company = company::model()->find('ID=:ID', array('ID' => $ID));
        $this->actionView($company->CID);
    }

    public function actionView($CID) {
        $company = company::model()->find('CID=:CID', array('CID' => $CID));
        $job=job::model()->findAll('CID=:CID',array('CID'=>$CID,));

        $this->render('view', array('company' => $company,
                                     'job'=>$job));
    }
    
    public function actionUpdate() {
        $ID = Yii::app()->user->getID();
        $CForm = new CompanyForm;
        $company = company::model()->find('ID=:ID', array('ID' => $ID));
        //CActiveRecord for old one
        $CForm->attributes = $company->attributes;
        $CForm->address = str_replace('<br />', "", $company->address);
        $CForm->about = str_replace('<br />', "", $company->about);
        if (isset($_POST['CompanyForm'])) {
                    $CForm->attributes = $_POST['CompanyForm'];
                    $company->cname = $CForm->cname;
                    $company->about = nl2br($CForm->about);
                    $company->address = nl2br($_POST['addressId']);
                    $company->contact=$CForm->contact;
                    $uploadedFile=CUploadedFile::getInstance($CForm,'image');
                    $oldfilename = $company->image;  
                    if (!empty($uploadedFile)) {      
                                    $fileName = str_replace(' ', '',"{$company->CID}-{$uploadedFile}");  // random number + file name
                                    $company->image = $fileName;
                         }          
                     if ($company->save())   {
                         if (!empty($uploadedFile)) {      
                                $uploadedFile->saveAs(Yii::app()->basepath.'/../images/company/'.$fileName);
                                if ($oldfilename != $fileName) {
                                        unlink(Yii::app()->basePath . '/../images/company/' . $oldfilename);// image will uplode to rootDirectory/banner    
                                }        
                                        
                         }   
                     }    
                         
          $this->redirect(array('company/Company'));
                    
                    }             
       
           $this->render('update', array('CForm' => $CForm, 'company' => $company, ));
    }
    //upgrade company account TBD    
    public function actionUpgrade() {
            
            
            $this->render('upgrade');
    }
       
   
        

}
   
  
 