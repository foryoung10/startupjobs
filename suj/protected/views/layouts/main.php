<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
<meta charset="UTF-8">
<?php $this->display_seo(); ?>
</head>
    
<!--
    <link rel="canonical" href="<?php Yii::app()->request->baseUrl;?>" />
-->
<body>
</body>
<div class="container" id="page">

	<div id="header">
        <?php Yii::app()->bootstrap->register(); ?>
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
                            'type'=>'', // null or 'inverse'
                            'brand'=>'<img src='.Yii::app()->request->baseUrl.'/images/suj.png style= "width: 120px">',
                            'collapse'=>true, // requires bootstrap-responsive.css
                            'items'=>array(
                                     array(
                                        'class'=>'bootstrap.widgets.TbMenu',
                                        'items'=>array(
                                                        // array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                                                        //array('label'=>'Contact', 'url'=>array('/site/contact')),
                                                        //array('label'=>'Register', 'url'=>array('/registration/registration')),
                                                        //array('label'=>'Jobs', 'url'=>array('/job/all')),
                                                        array('label'=>'Registration', 'url'=>array('/registration/registration'),'visible'=>Yii::app()->user->isGuest),
                                                        array('label'=>'Register Company', 'url'=>array('/registration/registerCompany'),'visible'=>Yii::app()->user->isMember()),
                                                        array('label'=>'Submit a job', 'url'=>array('/job/submitJob'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Deposit', 'url'=>array('/user/depositResume'),'visible'=>Yii::app()->user->isMember()),
                                                        array('label'=>'Company', 'url'=>array('/company/company'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Update Profile', 'url'=>array('/company/update'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Manage', 'url'=>array('/admin/manage'),'visible'=>Yii::app()->user->isAdmin()),
                                                        array('label'=>'Manage Jobs', 'url'=>array('/job/manageJobs'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Applications', 'url'=>array('/company/application'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Applications', 'url'=>array('/user/application'),'visible'=>Yii::app()->user->isMember()),
                                                        //   array('label'=>'Upgrade', 'url'=>array('/company/upgrade'),'visible'=>Yii::app()->user->isCompany()),
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
  
 <?php if(isset($this->breadcrumbs)):?>
               <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                                'links'=>$this->breadcrumbs,
                )); ?>
<?php endif?>

<?php echo $content; ?>

<div class="clear"></div>

    <div id="footer">
	<ul class="nav nav-pills">    
	<li>ABOUT US</li>
        <li>TESTIMONIAL</li>
        <li>BLOG</li>
        <li>ADVISORS</li>
        <li>EVENTS</li>
        <li>PRESS RELEASE</li>
        <li>CONNECT</li>
        </ul>
	<div>Copyright &copy; <?php echo date('Y'); ?> by  Startup Jobs Asia. All Rights Reserved.</div>

	</div><!-- footer -->
</html>
