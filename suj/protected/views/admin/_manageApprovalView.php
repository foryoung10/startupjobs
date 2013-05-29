<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

          <table class ="table">
         <div class ="span2 ">
                    <?php // echo CHtml::link($data->company->cname, array('job/job', 'JID' => $data->JID)) ; ?>
                    <?php echo $data->ANo; ?>
         
        
                    <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' height="80" width="80" >'?>
                    <?php echo CHtml::link($image, array('company/view', 'CID'=>$data->CID)); ?>
         </div>
         <div class ="span2">
                    <?php echo $data->company->cname; ?>
         </div>
          <div class ="span2">
                    <?php echo $data->company->started; ?>
         </div>     
         <div class="btn-toolbar">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                      'label'=>'Approve',
                                                                      'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                      //array('job/update'),    
                                                                      'url'=>Yii::app()->createUrl("admin/approve", array("CID"=>$data->CID )))); ?>
     
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                      'label'=>'Delete',
                                                                      'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                       //array('job/update'),    
                                                                       'url'=>'',)); ?>
     
</div>
   </table>