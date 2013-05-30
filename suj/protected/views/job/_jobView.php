<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

         <div class ="span2 ">
                    <?php echo $data->type; ?>
         </div>
         <div class ="span2">
                    <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' height="80" width="80" >'?>
                    <?php echo CHtml::link($image, array('company/view', 'CID'=>$data->CID, $data->title)); ?>
         </div>
         <div class ="span5">
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID, $data->title  )) ; ?>
         </div>
         <div class="clear"></div>
         
