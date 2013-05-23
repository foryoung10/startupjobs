<?php
$this->pageTitle = Yii::app()->name . ' - Job';
$this->breadcrumbs = array(
    'Job',
);
?>

<div class="row-fluid">
  

      <div class="span6">   
              <h1><?php echo CHtml::encode($job->title); ?></h1>      
               <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $company->image.' height="200" width="200" >'?>
               <?php echo CHtml::link($image, array('company/view', 'CID'=>$company->CID)); ?>
              <h3><?php echo CHtml::encode($company->cname) ?></h3> 
               <h3> About </h3>
               <?php echo CHtml::encode($job->description) ?>
               <h4> How to apply </h4>
     </div>
     <div class="span3 offset1">
               <h3> Type </h3>
               <?php echo CHtml::encode($job->type) ?>
               <h3> Salary </h3>
               <?php echo CHtml::encode($job->salary) ?>
     </div>
</div>
