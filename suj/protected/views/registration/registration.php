<?php
$this->pageTitle = Yii::app()->name . ' - Registration';
$this->breadcrumbs = array(
    'Registration',
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
        <?php echo $form->textFieldRow($model, 'username'); ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('size' => 20, 'maxlength' => 15)); ?>
        <?php echo $form->passwordFieldRow($model, 'password2', array('size' => 20, 'maxlength' => 15)); ?>
        <?php echo $form->textFieldRow($model, 'name', array('size' =>40)); ?>
        <?php echo $form->textFieldRow($model, 'email', array('size' => 40, 'rows' => 1)); ?>

        <?php if (CCaptcha::checkRequirements()): ?>
                       <?php echo $form->labelEx($model, 'verifyCode'); ?>
                       <?php $this->widget('CCaptcha'); ?>
	               </br></br>
                       <?php echo $form->textField($model, 'verifyCode'); ?>
		       </br>
                       </br>
                       <div class="hint">Please enter the letters as they are shown in the image above.
                            <br/>Letters are not case-sensitive.</div>
                            <?php echo $form->error($model, 'verifyCode'); ?>
                       </div>        
      <?php endif; ?>
      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

<?php $this->endWidget(); ?>








