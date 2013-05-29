<?php
$this->pageTitle = Yii::app()->name . ' - Submit a Job';
$this->breadcrumbs = array(
    'Submit a Job',);
?>

<p>
Please fill out the form with your particulars
</p>
<div class ="span8">
    <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'verticalForm',
                                                                                //'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldRow($model, 'title',array('class'=>'span4')); ?>
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
       <?php echo $form->dropDownListRow($model, 'location', array(''         =>'',
                                                                'Full-time' => 'Full-time',
                                                                'Part-time' => 'Part-time',
                                                                'Freelance' => 'Freelance',
                                                                'Internship'=> 'Internship',
                                                                'Temporary' => 'Temporary'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
  
       <?php echo $form->textAreaRow($model,'description', array('class'=>'span8', 'rows'=>15)); ?>
       <?php echo $form->textAreaRow($model,'tags', array('class'=>'span8', 'rows'=>2)); ?> 
       <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
        
    <?php $this->endWidget(); ?>
</div>




