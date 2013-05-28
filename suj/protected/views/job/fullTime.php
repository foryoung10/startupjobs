<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
      <h1>Premium Jobs</h1>
       <div class="span8">
<?php
        $premium=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'limit'=>3,
                                                                    'order'=>new CDbExpression('RAND()'),
                                                                    ),
                                                                    'pagination' => false
                                                )); ?>
       
 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$premium,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'itemsTagName'=>'table',
            'itemsCssClass'=>'table',
            'summaryText'=>'',
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            
));
 ?>
 </div>
  <div class="clear"></div>
<h1> Full time </h1>
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'type=:type',
                                                                    'params'=>array(':type'=>'Full-time'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>20,
                                                                    ),
                                                ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
            'title',
            'type' => 'Type',    
           // 'created'=>'Created',
    ),
));
