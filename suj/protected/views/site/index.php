<?php
$this->pageTitle=Yii::app()->name;
?>
<p>
<?php $this->widget('bootstrap.widgets.TbCarousel', array('items'=>array(
            array('image'=>'http://placehold.it/770x400&text=Second+thumbnail', 'label'=>'First Thumbnail label', 'caption'=>'Welcome to Startup Jobs'),
            array('image'=>'http://placehold.it/770x400&text=Second+thumbnail', 'label'=>'Second Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
            array('image'=>'http://placehold.it/770x400&text=Third+thumbnail', 'label'=>'Third Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
    ),)); 
?>

<div class="row-fluid">
      <h1>Premium Jobs</h1>
      <div class="clear">
      <?php $premium=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'limit'=>3,
                                                                    'order'=>new CDbExpression('RAND()'),
                                                                    'with'=>array('company'), ),
                                                                    'pagination' => false
                                                )); ?>
       
      <?php $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider'=>$premium,
                'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
                'itemView'=>'_jobViewPremium',   // refers to the partial view named '_post'
                'itemsTagName'=>'table',
                'itemsCssClass'=>'table',
                'summaryText'=>'',
                //'ajaxUpdate'=>false,
                //'htmlOptions' => array("class"=>"table table-striped"),   
            ));
      ?>
</div>
<h1>Latest Jobs</h1>
<div class="clear">
        <?php $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'with'=>array('company'),),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,),
                                                )); ?>
        
        <?php $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider'=>$dataProvider,
                'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
                'itemView'=>'_jobView',   // refers to the partial view named '_post'
                //'ajaxUpdate'=>false,
                //'htmlOptions' => array("class"=>"table table-striped"),   
                'sortableAttributes'=>array(
                                'title',
                                'type' => 'Type',),    
                                // 'created'=>'Created',
        ));
        ?>
</div>
</div>