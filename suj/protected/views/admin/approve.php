<?php
$this->pageTitle = Yii::app()->name . ' - Manage Accounts';
$this->breadcrumbs = array(
    'Manage Accounts',
);
?>
<title>Approve Company | StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>


<h1>Manage Accounts</h1>
<?php $dataProvider = new CActiveDataProvider('approve', array(
                                                        'criteria' => array(
                                                        'with'=>array('company'),
                                                        'condition'=>'status=0',
                                                        //'params'=>array(':status'=>0),
                                        )));
?>      
<table class="table ">
 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_manageApprovalView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
            
            
           // 'created'=>'Created',
    ),
));
 ?>