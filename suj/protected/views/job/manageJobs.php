<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1> Manage Jobs </h1>

<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'with'=>array('company'),
                                                                    'condition'=>'ID=:ID',
                                                                    'params'=>array(':ID'=>Yii::app()->user->getID()),
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
            'itemView'=>'_manageJobView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
            'title',
            'type' => 'Type',    
            
           // 'created'=>'Created',
    ),
));
 ?>