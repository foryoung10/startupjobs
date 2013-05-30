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
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldRow($model, 'title',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model, 'type', array(''         =>'',
                                                                'Full-time' => 'Full-time',
                                                                'Part-time' => 'Part-time',
                                                                'Freelance' => 'Freelance',
                                                                'Internship'=> 'Internship',
                                                                'Temporary' => 'Temporary'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>

       
                                                                 <?php echo $form->dropDownListRow($model, 'location', array('Singapore' => 'Singapore',
                                                                'China' => 'China',
                                                                'India' => 'India',
                                                                'Indonesia' => 'Indonesia',
                                                                'Japan'=> 'Japan',
                                                                'Korea, South' => 'Korea, South',
                                                                'Malaysia' => 'Malaysia',
                                                                'Myanmar' => 'Myanmar',
                                                                'Singapore' => 'Singapore',
                                                                'Taiwan' => 'Taiwan',
                                                                'Thailand' => 'Thailand',
                                                                'Vietnam' => 'Vietnam',), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
        <?php echo $form->dropDownListRow($model, 'salary', array(''         =>'',
                                                                 '0 -1000' => '$0 - $1000',
                                                                 '1001-2000' => '$1001-$2000',
                                                                 '2001-4000' => '$2001-$4000',
                                                                 '4001-7000'=> '$4001-$6000',
                                                                 'Above 10000' => 'Above $10000'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
        <?php echo $form->dropDownListRow($model, 'category', array(''         =>'',
                                                                 'Analytics' => 'Analytics',
                                                                 'Business Development' => 'Business Development',
                                                                 'Coporate Support' => 'Coporate Support',
                                                                 'Customer Service'=> 'Customer Service',
                                                                 'Design' => 'Design',
                                                                 'Feature'=>'Featured',
                                                                 'Marketing'=>'Marketing',
                                                                 'Public Relations'=>'Public Relations',
                                                                 'Technical' =>'Technical',
                                                                 'UX/UI'=>'UX/UI'),                                                          
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
          
       <?php echo $form->textAreaRow($model,'description', array('class'=>'span8', 'rows'=>15)); ?>
       <?php echo $form->textAreaRow($model,'tags', array('class'=>'span8', 'rows'=>2)); ?> 
       <div class="form-actions">
       <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
       </div>
    <?php $this->endWidget(); ?>
</div>




