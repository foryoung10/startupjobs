<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i> testing site </h1>-->
<p>
    
           <?php $this->widget('bootstrap.widgets.TbCarousel', array(
                                                                     'items'=>array(
        array('image'=>'http://placehold.it/770x400&text=Second+thumbnail', 'label'=>'First Thumbnail label', 'caption'=>'Welcome to Startup Jobs'),
        array('image'=>'http://placehold.it/770x400&text=Second+thumbnail', 'label'=>'Second Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
        array('image'=>'http://placehold.it/770x400&text=Third+thumbnail', 'label'=>'Third Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
    ),
)); ?>

    <div class="row-fluid">
      <div class="span8">
      
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
 <h1>Latest Jobs</h1>
 <div class="span8">
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,
                                                                    ),
                                                )); ?>
        
 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
            'title',
            'type' => 'Type',    
            
           // 'created'=>'Created',
    ),
));
 ?>
</div>
    </div>

</div>