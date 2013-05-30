<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   
<div class="clear">

                    <?php  // $company= $data->company;
                           // $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $company->image.' style "height=110 width=110" >';
                         //echo CHtml::link($image, array('company/view', 'CID'=>$data->CID));?>
         <div class ="span11">
                    <?php $url = str_replace(' ','-',$data->title);?> 
             
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID, 'title'=>$url,)); ?>
                    <div class="Border">
				<div class="bottomLine <?php echo $data->type; ?>"></div>
	           </div>
         </div>
		<div id="JobType" class="type">
		         <div class ="<?php echo $data->type; ?>">
		                    <?php echo $data->type; ?>
		         </div>
		</div>       
                <?php echo $data->location;?>
</div>
         

