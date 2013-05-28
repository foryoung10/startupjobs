<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   
<div class="Premium">
         <div class ="PremiumLogo">
                    <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' height="110" width="110" >'?>
                    <?php echo CHtml::link($image, array('company/view', 'CID'=>$data->CID)); ?>
         </div>
         <div class ="PremiumType">
                    <?php echo $data->type; ?>
         </div>

         <div class ="PremiumTitle">
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="PremiumDescription">
                    <?php echo CHtml::link($data->description, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>         
</div>
         
