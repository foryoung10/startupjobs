<?php
$this->pageTitle = Yii::app()->name . ' - All jobs';
$this->breadcrumbs = array(
    'All Jobs',
);
?>


      <h1>Jobs</h1>
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'with'=>array('company'),
                                                                    'together' => true,    
                                                             //       'scope'=>'Full-time',    
                                                                   // 'condition'=>'type=:type',
                                                                   // 'params'=>array(':type'=>'Full-time'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,
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
?>

</table>
