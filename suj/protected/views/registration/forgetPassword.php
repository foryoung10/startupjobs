<?php
$this->pageTitle=Yii::app()->name . ' - Forget Password';
$this->breadcrumbs=array(
	'Forget Password',
);
?>
<title>Forget Password | StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>

         
                <h3>Request for Username and Password</h3>
                <br>
           
                Enter your Email address
<?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>
        
        <?php echo $form->textFieldRow($model, 'email', array('class' =>'span3')); ?>
        
 <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
        </div>    
<?php $this->endWidget(); ?>
