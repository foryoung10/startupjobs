<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   


<div class="clear">
                    <?php $url1 = "{$data->company->cname} {$data->company->location}";?>
                    <?php   //$company= $data->company;
                            $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' style "height=110 width=110" >';
                            echo CHtml::link($image, array('company/view', 'CID'=>$data->CID, 'title'=>$url1));?>
                    <?php //$url = str_replace(' ','-',$data->title);?> 
             
                         
    <div class ="span11">
                    <?php echo $data->location;?>
                    <div class="Border">
				<div class="bottomLine <?php echo $data->type; ?>"></div>
	           </div>
         </div>
		<div id="JobType" class="type">
		         <div class ="<?php echo $data->type; ?>">
		                    <?php echo $data->type; ?>
		         </div>
		</div> 
     <?php $url2 = "{$data->title} {$data->company->cname} {$data->location}";?>
     <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID, 'title'=>$url2,)); ?>   
                
</div>
         

