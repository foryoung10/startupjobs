<?php
$this->breadcrumbs = array(
    $job->title,
);
$this->pageTitle = "Startup Hire: {$job->title} {$company->cname} {$job->location}";
$this->pageDesc = $job->description;
$this->pageOgTitle = "{$job->title} {$company->cname} {$job->location}";
$this->pageOgDesc= $job->description;
$this->pageOgImage='/images/company/180/'.$company->image;

?>

              <?php $url = str_replace(' ','-',$company->cname);?> 
              <h1><?php echo CHtml::encode($job->title); ?></h1>      
               <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $company->image.' height="200" width="200" >'?>
               <?php echo CHtml::link($image, array('company/view', 'CID'=>$company->CID,'title'=>$url)); ?>
              <h3><?php echo CHtml::encode($company->cname) ?></h3> 
  <div class="row-fluid">
      <div class="span6">    
              <h3> About </h3>
               <?php echo nl2br($job->description) ?>
               <h4> How to apply </h4>
                
     </div>
     <div class="span3 offset1">
               <h3> Type </h3>
               <?php echo CHtml::encode($job->type) ?>
               <h3> Salary </h3>
               <?php echo CHtml::encode($job->salary) ?>
               <h3> location </h3>
               <?php echo CHtml::encode($job->location)?>
     </div>
</div>
    
<div id="job" class="apply-instructions">
  <?php $this->widget('bootstrap.widgets.TbButton', array(
                                        'label'=>'Apply Online',
                                        'type'=>'primary', 
                                        'size'=>'large', 
                                        'url'=>Yii::app()->createUrl("user/applyJob", array("JID"=>$job->JID )),    
)); ?>  

</div>