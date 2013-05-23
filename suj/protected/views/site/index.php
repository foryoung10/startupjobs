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
    </div>
    <div class="span4">
        <b><h3> Last updated: </h3><h3>11/3/2013 </h3></b> 
        <?php $this->widget('application.extensions.WSocialButton', array('style'=>'box'));?>
    </div>
</div>