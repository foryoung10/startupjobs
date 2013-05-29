<?php
$this->pageTitle = Yii::app()->name . ' - Update Job';
$this->breadcrumbs = array(
    'Update Job',);
?>

<p>
Please fill out the form with your particulars
</p>
<div class ="span6">
    <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'verticalForm',
                                                                                //'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldRow($model, 'title',array('size'=>40)); ?>
        <?php echo $form->dropDownListRow($model, 'type', array(''         =>'',
                                                                'Full-time' => 'Full-time',
                                                                'Part-time' => 'Part-time',
                                                                'Freelance' => 'Freelance',
                                                                'Internship'=> 'Internship',
                                                                'Temporary' => 'Temporary'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>

       <?php echo $form->dropDownListRow($model, 'salary', array(''         =>'',
                                                                 '<1000' => '<$1000',
                                                                 '1000-2000' => '$1000-$2000',
                                                                 '2000-4000' => '$2000-$4000',
                                                                 '4000-6000'=> '$4000-$6000',
                                                                 '>6000' => '>$6000'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
      <?php echo $form->textAreaRow($model,'description', array('class'=>'span6', 'rows'=>10)); ?>
      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
        
    <?php $this->endWidget(); ?>
</div>




