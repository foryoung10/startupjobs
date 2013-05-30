<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form abc with your login credentials:</p>
<br>
 


<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
 
<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
 
<?php // $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
 <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Login')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
