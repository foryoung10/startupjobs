<?php
$this->pageTitle = Yii::app()->name . ' - View Company';
$this->breadcrumbs = array(
    'View Company',
);
?>
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

