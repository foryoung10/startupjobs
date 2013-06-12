<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

<div class="Premium">
         <div class ="PremiumLogo">
                    <?php $url1 = "{$data->company->cname} {$data->company->location}";?>
                    <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' height="110" width="110" >'?>
                    <?php echo CHtml::link($image, array('company/view', 'CID'=>$data->CID,$url1)); ?>
         </div>
         <div class ="PremiumType">
                    <?php echo $data->type; ?>
         </div>

         <div class ="PremiumTitle">
                    <?php $url2 = "{$data->title} {$data->company->cname} {$data->location}";?>
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID,$url2)) ; ?>
         </div>
         <div class ="PremiumDescription">
                    <?php echo $data->description ; ?>
         </div>         
</div>
         
