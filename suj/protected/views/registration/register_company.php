<?php
$this->pageTitle = Yii::app()->name . ' - Register a Job';
$this->breadcrumbs = array(
    'Register a Job',
);
?>

<p>
Please fill out the form with your particulars
</p>
 <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldRow($model, 'cname', array('size' =>40)); ?>
        <?php echo $form->textFieldRow($model, 'cemail', array('size' => 40, 'rows' => 1)); ?>

        <?php if (CCaptcha::checkRequirements()): ?>
                       
                       
                       <div class="hint">Please enter the letters as they are shown in the image above.
                            <br/>Letters are not case-sensitive.</div>
                            <?php echo $form->error($model, 'verifyCode'); ?>
                       <?php echo $form->captcharow($model,'verifyCode'); ?>
                        </div>        
      <?php endif; ?>
      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

<?php $this->endWidget(); ?>





