<?php

class CompanyController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

        
        public function editCompany(){
                $record = new $company;
            
            
                $this->render('edit');
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
  //      $CForm->about = str_replace('<br />', "", $company->about);
        if (isset($_POST['CompanyForm'])) {
                    $CForm->attributes = $_POST['CompanyForm'];
                    $company->cname = $CForm->cname;
                    $company->about = nl2br($CForm->about);
                    $company->address = nl2br($_POST['addressId']);
                    $company->contact=$CForm->contact;
                     $uploadedFile=CUploadedFile::getInstance($CForm,'image');
                     if (!empty($uploadedFile)) {      
                     
                                    $fileName = "{$CID}-{$uploadedFile}";  // random number + file name
                                    $company->image = $fileName;
                         }          
                     if ($company->save())   {
                         if (!empty($uploadedFile)) {      
                                $uploadedFile->saveAs(Yii::app()->basepath.'/../images/company/'.$fileName);  // image will uplode to rootDirectory/banner    
                         }   
                     }    
                         
          $this->redirect(array('company/myProfile'));
                    
                    }             
       
            $this->render('update', array('CForm' => $CForm, 'company' => $company, ));
        }
        
        public function actionUpgrade() {
            
            
            $this->render('upgrade');
        }
        
 /*   public function actionCreate()
    {
        $model=new Banner;  // this is my model related to table
        if(isset($_POST['Banner']))
        {
            
            $model->attributes=$_POST['Banner'];
 
            $uploadedFile=CUploadedFile::getInstance($CForm,'image');
            $fileName = Yii::app()->user->get_Id();  // random number + file name
            $CForm->image = $fileName;
 
            if($model->save())
            {
                $uploadedFile->saveAs(Yii::app()->basePath.'/../Company_logo/'.$fileName);  // image will uplode to rootDirectory/banner/
                $this->redirect(array('site/home'));
            }
        }
        $this->render('create',array(
            'model'=>$model,
        ));
    }
*/
   }
   
  
 