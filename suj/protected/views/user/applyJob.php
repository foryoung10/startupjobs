<?php
$this->pageTitle=Yii::app()->name . ' - Apply';
$this->breadcrumbs=array(
	'Apply',
);
?>
<title>Apply for Job | StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>

<h1>Confirmation</h1>
<h3>You are submitting</h3>
  <?php if($user->resume != null)
          echo 'You have uploaded ';   
          echo   CHtml::link(CHtml::encode($user->resume),Yii::app()->baseUrl . '/resume/'.$user->resume, array('target'=>'_blank')); ?>
 
          
<br>
Or upload another resume

<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
    <?php echo $form->errorSummary($model); ?> 
    <?php echo $form->fileFieldRow($model, 'resume'); ?>
    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span9', 'rows'=>10)); ?>
        

<div id="job" class="apply-instructions">
    <h3>Are you sure you want to submit this? </h3>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

</div>
            
<?php $this->endWidget(); ?>

