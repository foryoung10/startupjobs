<?php
$this->pageTitle=Yii::app()->name . ' - Forget Password';
$this->breadcrumbs=array(
	'Forget Password',
);
?>
<div id="inspired_wrapper">    

    <div id="inspired_content_top"></div>

    <div id="inspired_content">
        <div id="inspired_big_content">
         
                <h3>Request for Username and Password</h3>
                <br>
           
                Enter your Email address

                <div class="form">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'forgetPw',
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                            ));
                    ?>
                    <!--    
                    <div class="row">

                        <?php echo $form->labelEx($model, 'Username'); ?>
                        <?php echo $form->textField($model, 'username'); ?>
                        <?php echo $form->error($model, 'username'); ?>
                    </div>
                    -->
                    <div class="row">
                        <?php echo $form->labelEx($model, 'email'); ?>
                        <?php echo $form->textField($model, 'email'); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>
                    
                    <div class="row buttons">
                        <?php echo CHtml::submitButton('Submit'); ?>
                    </div>

                    <?php $this->endWidget(); ?>					
                </div>  
            </div>
  

        <div class="cleaner"></div>
    </div>
</div> <!-- end of wrapper -->



