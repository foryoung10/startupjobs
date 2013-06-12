<?php
$this->breadcrumbs=array(
	'Error',
);
$this->pageTitle = 'Error '.$code." | ".Yii::app()->params['pageTitle'];
?>



<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>

 
                    