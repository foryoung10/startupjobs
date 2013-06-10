<?php
$this->pageTitle = Yii::app()->name . ' - Update Job';
$this->breadcrumbs = array(
    'Update Job',);
?>
<title>Update Job | StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>

<p>
Please fill out the form with your particulars
</p>
<div class ="span6">
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
                                                                 '<1000' => '<$1000',
                                                                 '1000-2000' => '$1000-$2000',
                                                                 '2000-4000' => '$2000-$4000',
                                                                 '4000-6000'=> '$4000-$6000',
                                                                 '>6000' => '>$6000'), 
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




