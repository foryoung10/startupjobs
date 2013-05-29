<?php
$this->pageTitle = Yii::app()->name . ' - All jobs';
$this->breadcrumbs = array(
    'All Jobs',
);
?>


      <h1>Jobs</h1>
<?php
        $premium=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'limit'=>3,
                                                                    'order'=>new CDbExpression('RAND()'),
                                                                    ),
                                                                    'pagination' => false
                                                )); ?>
        <table class="table ">
 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$premium,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'itemsTagName'=>'table',
            'itemsCssClass'=>'table',
            'summaryText'=>'',
            'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            
));
 ?>
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,
                                                                    ),
                                                )); ?>
        <table class="table ">
 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
            'title',
            'type' => 'Type',    
            
           // 'created'=>'Created',
    ),
));
 ?>
</table>
