<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

    <table class ="table">
         <div class ="span2">
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="span2">
                    <?php echo $data->description; ?>
         </div>
         <div class="btn-toolbar">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                            'label'=>'Modify',
                                                            'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                            //array('job/update'),    
                                                            'url'=>Yii::app()->createUrl("job/update", array("JID"=>$data->JID )),)); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                            'label'=>'Delete',
                                                            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                            //array('job/update'),    
                                                            'url'=>Yii::app()->createUrl("job/update", array("JID"=>$data->JID )),)); ?>
        </div>
   </table>

?>