<?php
$this->pageTitle=Yii::app()->name;
?>
<p>
<title>StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>

<style type="text/css">
body
{
    background-image:url("<?php echo Yii::app()->request->baseUrl.'/images/mainbackground.jpg' ?>");
    height: auto;
    width:auto;
    background-color: #000000;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: -25px;
}
</style>

<?php $this->widget('bootstrap.widgets.TbCarousel', array('items'=>array(
            array('image'=>'http://placehold.it/770x400&text=Second+thumbnail', 'label'=>'First Thumbnail label', 'caption'=>'Welcome to Startup Jobs'),
            array('image'=>'http://placehold.it/770x400&text=Second+thumbnail', 'label'=>'Second Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
            array('image'=>'http://placehold.it/770x400&text=Third+thumbnail', 'label'=>'Third Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
    ),)); 
?>
</div>
<?php date_default_timezone_set('Asia/Singapore');?>
<div class="row-fluid">
      <h1>Premium Jobs</h1>
      <div class="clear">
          
      <?php $premium=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'limit'=>3,
                                                                    'order'=>new CDbExpression('RAND()'),
                                                                    //'condition'=>'expire >= today',
                                                                    //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    'with'=>array('company'), ),
                                                                    'pagination' => false
                                                )); ?>
       
      <?php $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider'=>$premium,
                'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
                'itemView'=>'_jobViewPremium',   // refers to the partial view named '_post'
                'itemsTagName'=>'table',
                'itemsCssClass'=>'table',
                'summaryText'=>'',
                //'ajaxUpdate'=>false,
                //'htmlOptions' => array("class"=>"table table-striped"),   
            ));
      ?>
</div>
<h1>Latest Jobs</h1>
<div class="clear">
        <?php $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'created DESC',
                                                                   // show all jobs that are not expired
                                                                   //'condition'=>'expire >=today',
                                                                   //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    'with'=>array('company'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,),
                                                )); ?>
        
        <?php $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider'=>$dataProvider,
                'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
                'itemView'=>'_jobView',   // refers to the partial view named '_post'
                //'ajaxUpdate'=>false,
                'sortableAttributes'=>array(
                                'title',
                                'type' => 'Type',),    
                                // 'created'=>'Created',
        ));
        ?>
</div>
</div>