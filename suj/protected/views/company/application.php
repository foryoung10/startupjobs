<?php
$this->pageTitle = Yii::app()->name . ' - Main';
$this->breadcrumbs = array(
    'Main');
?>
<title>Application | StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>

<h1>Applications</h1>

     
       <?php
        $dataProvider=new CActiveDataProvider('application', array( 'criteria'=>array(
                                                                    'order'=>'applied DESC',
                                                                    'with' =>array('job','company'),
                                                                    'condition'=>'company.CID=:CID',
                                                                    'params'=>array(':CID'=>$company->CID),    
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,
                                                                    ),
                                                )); ?>
        
 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_applicationView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
              'job.title'=>'Title',
            
           // 'created'=>'Created',
    ),
));
 ?>