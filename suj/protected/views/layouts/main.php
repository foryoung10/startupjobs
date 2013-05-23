<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
	<!--
        <!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
         <!--   
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
         -->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
</body>
<div class="container" id="page">

	<div id="header">
        <?php Yii::app()->bootstrap->register(); ?>
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
                            'type'=>'', // null or 'inverse'
                            'collapse'=>true, // requires bootstrap-responsive.css
                            'items'=>array(
                                     array(
                                        'class'=>'bootstrap.widgets.TbMenu',
                                        'items'=>array(
                                                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                                                        array('label'=>'Contact', 'url'=>array('/site/contact')),
                                                        //array('label'=>'Register', 'url'=>array('/registration/registration')),
                                                        //array('label'=>'Jobs', 'url'=>array('/job/all')),
                                                        array('label'=>'Registration', 'url'=>array('/registration/registration'),'visible'=>Yii::app()->user->isGuest),
                                                        array('label'=>'Register Company', 'url'=>array('/registration/registerCompany'),'visible'=>Yii::app()->user->isMember()),
                                                        array('label'=>'Submit a job', 'url'=>array('/job/submitJob'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Company', 'url'=>array('/company/company'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Edit', 'url'=>array('/company/update'),'visible'=>Yii::app()->user->isAdmin()),
                                                        array('label'=>'Manage', 'url'=>array('/admin/manage'),'visible'=>Yii::app()->user->isAdmin()),
                                                        array('label'=>'Manage Jobs', 'url'=>array('/job/manageJobs'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Upgrade', 'url'=>array('/company/upgrade'),'visible'=>Yii::app()->user->isCompany()),
                                                        
                                            ),
                                    ),
                            '<form class="navbar-search pull-left" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/search" method = "post"><input type="text" class="search-query span2" placeholder="Search"></form>',
                            array(
                                    'class'=>'bootstrap.widgets.TbMenu',
                                    'htmlOptions'=>array('class'=>'pull-right'),
                                    'items'=>array(
                                                    array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                                                            array('label'=>'Action', 'url'=>'#'),
                                                            array('label'=>'Another action', 'url'=>'#'),
                                                            array('label'=>'Something else here', 'url'=>'#'),
                                                            '---',
                                                            array('label'=>'Separated link', 'url'=>'#'),
                                                    )),
                                                    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                                    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                                    ),
                            ),
                    ),
            )); ?>
    <div class="row-fluid">
        <div class="span4">
            <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/suj.png>'?>
            <?php echo CHtml::link($image, array('site/index')); ?>
     
	</div><!-- header -->

        <div class="span6 offset2 ">
                    <?php $this->widget('bootstrap.widgets.TbMenu', array(
                                        'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
                                        'stacked'=>false, // whether this is a stacked menu
                                        'items'=>array(
                                                        array('label'=>'Latest', 'url'=>array('/job/latest')),
                                                        array('label'=>'Full-Time', 'url'=>array('/job/fullTime')),
                                                        array('label'=>'Part-Time', 'url'=>array('/job/partTime')),
                                                        array('label'=>'Internship', 'url'=>array('/job/internship')),
                                                        array('label'=>'Temporary', 'url'=>array('/job/temporary')),
                                                        array('label'=>'Freelance', 'url'=>array('/job/freelance')),
                                        
                                        ),
                    )); ?>
            </div>
    </div>
 	
	<?php if(isset($this->breadcrumbs)):?>
	
                <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                )); ?>
                <?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
            <!--<li>ABOUT US</ul>
            <ul>TESTIMONIAL</ul>
            <ul>BLOG</ul>
            <ul>ADVISORS</ul>
            <ul>EVENTS</ul>
            <ul>PRESS RELEASE</ul>
            <ul>CONNECT</ul>
            -->
		Copyright &copy; <?php echo date('Y'); ?> by  Startup Jobs Asia.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->


</html>
