<?php



class AdminController extends Controller
{
     public function actionManage() {
          $data = approve::model()->with('company')->findAll();
          
          $this->render('approve',$data);
          
    }



    public function actionApprove($CID)   {
                $company = company::model()->find('CID=:CID',array(':CID'=>$CID));
                $company->status = 1;
                $company->save();
                $approve = approve::model()->find('CID=:CID',array(':CID'=>$CID));
                $approve -> approved = new CDbExpression('NOW()');
                $approve ->status = 1;
                $approve->save();
    }

    public function actionModify($id) {
                $this->redirect(array('admin/setAdmin','id'=>$id));
    }
    
    public function actionSetAdmin($id) {
                $model= new setAdmin;
                $record = member::model()->find('profileID=:profileID', array('profileID' => $id));
                $model->attributes=$record->attributes;
                
                if (isset($_POST['setAdmin']))   {
                $model->attributes =$_POST['setAdmin'];
                $record->role=$model->role;
                
                if($record->save()) {
                    $this->redirect(array('admin/manage'));
                }    
                }
                $this->render('setAdmin',array('model'=>$model));
                        
    }

    public function actiontransaction() {
        $this->render("transaction");
    }
    
}
?>