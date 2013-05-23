<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1> Internship </h1>
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'type=:type',
                                                                    'params'=>array(':type'=>'Internship'),
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
