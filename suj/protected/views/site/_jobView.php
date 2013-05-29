<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   
<div class="clear">

      <!--   <div class ="span2">
                    <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' height="80" width="80">'?>
                    <?php echo CHtml::link($image, array('company/view', 'CID'=>$data->CID));?>
         </div>-->
         <div class ="span11">
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID)) ; ?>
                    <div class="Border">
						<div class="bottomLine <?php echo $data->type; ?>"></div>
					</div>
         </div>
		<div id="JobType" class="type">
		         <div class ="<?php echo $data->type; ?>">
		                    <?php echo $data->type; ?>
		         </div>
		</div>       
</div>
         
