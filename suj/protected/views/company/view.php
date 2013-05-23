<?php
$this->pageTitle = Yii::app()->name . ' - View Company';
$this->breadcrumbs = array(
    'View Company',
);
?>

   
    <div>
        <h1><?php echo CHtml::encode($company->cname); ?></h1>      
        <!-- <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/company/<?php echo $company->image;?> height='80' width='80'" >
        -->  
        <?php echo '<img src='.Yii::app()->request->baseUrl.'/images/company/'. $company->image.' height="200" width="200" >'?>
    </div>
    <div class="row-fluid">
            <div class="span8">
                <h3> About </h3>
                <?php   echo count($job);
                        echo CHtml::encode($company->about) ?>
                <?php if (count($job)>0):?>
                        <h3> Available Jobs </h3>
                <?php foreach($job as $job): ?>
                        <?php echo CHtml::link($job->title, array('job/job', 'JID' => $job->JID)) ; ?>
                        <p>Job Title: <?php echo $job->title; ?> </p>
                        <p>Description: <?php echo $job->description; ?></p>
                <?php endforeach; ?>
                <?php endif?>
            </div>
            <div class="span3 offset1">
                <h3> Address </h3>
                <?php echo CHtml::encode($company->address) ?>
                <h3> Contact </h3>
                <?php echo CHtml::encode($company->contact) ?>
       </div>
</div>

