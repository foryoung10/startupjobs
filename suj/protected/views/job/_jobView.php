<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="-1"/>
<title>Startup Hire: <?php echo $data->title ?> at <?php echo $data->company->cname ?> <?php echo $data->location ?></title>
<meta name="description" content="<?php echo $company->mission ?>. StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | Starup Careers | Startup Career"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="Front-End Developer"/>
<meta property="og:description" content="<?php echo $data->description?>. StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | Starup Careers | Startup Career"/>
<meta property="og:url" content="<?php echo Yii::app()->request->baseUrl.'/company/'.$data->company->cname ?>" />
<meta property="og:image" content="<?php Yii::app()->request->baseUrl.'/images/company/'. $data->company->image?>"/>
<meta property="article:published_time" content="2013-06-06"/>
<meta property="article:modified_time" content="2013-06-06"/>
<meta property="article:tag" content="UX/UI"/>
<meta property="article:tag" content="Full-Time"/>
<meta property="article:tag" content="expressjs"/>
<meta property="article:tag" content="mongodb"/>
<meta property="article:tag" content="redis"/>
<meta property="article:tag" content="ui"/>
<meta property="article:tag" content="ux"/>
<meta property="og:site_name" content="StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups"/>
<meta name="twitter:card" content="summary"/>
</head>
         <div class ="span2 ">
                    <?php echo $data->type; ?>
         </div>
         <div class ="span2">
                    <?php $url1 = "{$data->company->cname} {$data->company->location}";?>
                    <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' height="80" width="80" >'?>
                    <?php echo CHtml::link($image, array('company/view', 'CID'=>$data->CID, $url1)); ?>
         </div>
         <div class ="span5">
                    <?php $url2 = "{$data->title} {$data->company->cname} {$data->location}";?>
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID, $url2  )) ; ?>
         </div>
         <div class="clear"></div>
         
