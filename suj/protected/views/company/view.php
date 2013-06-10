<?php
$this->pageTitle = Yii::app()->name . ' - View Company';
$this->breadcrumbs = array(
    'View Company',
);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="-1"/>
<title>Startup Company: <?php echo $company->cname ?></title>
<meta name="description" content="<?php echo $company->mission ?>. StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | Starup Careers | Startup Career"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="Front-End Developer"/>
<meta property="og:description" content="<?php echo $company->mission?>. StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | Starup Careers | Startup Career"/>
<meta property="og:url" content="<?php echo Yii::app()->request->baseUrl.'/company/'.$company->cname ?>" />
<meta property="og:image" content="<?php Yii::app()->request->baseUrl.'/images/company/'. $company->image?>"/>
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
<?php /*
"<style type="text/css">
header
{
    background-image:url('<?php echo Yii::app()->request->baseUrl.'/images/cover/'. $company->coverpicture ?>');
    height: 136px;
    width:100px;
    background-color: #000000;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: -25px;
}
</style>" */
?>
    <div>
        
        <!-- <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/company/<?php echo $company->image;?> height='80' width='80'" >
        -->  
        <?php echo '<img src='.Yii::app()->request->baseUrl.'/images/company/'. $company->image.' height="200" width="200" >'?>
        <h1><?php echo CHtml::encode($company->cname); ?></h1>      
    </div>

    
        
<div id="company" class= "info">
    <div class="row-fluid">
            <div class="span2">
                <h3> Location</h3>
            </div>    
    </div>
</div>

    <div class="row-fluid">
            <div class="span8">
                <h3> Our Mission </h3>
                <?php //   echo count($job);
                        echo str_replace('</br>',"",$company->mission); 
                        echo '<h3> Our Culture </h3>';
                
                        echo str_replace('</br>',"",$company->culture); 
                        echo '<h3> Benefits </h3>';
                
                        echo str_replace('</br>',"",$company->benefits); 
                        
                        //echo CHtml::encode($company->about) ?>
               
                        
               
            </div>
            <div class="span3 offset1">
                <h3> Address </h3>
                <?php echo str_replace('</br>',"",$company->address);?>
                <h3> Contact </h3>
                <?php echo CHtml::encode($company->contact) ?>
                <h3> Available Jobs </h3>
       </div>
</div>

