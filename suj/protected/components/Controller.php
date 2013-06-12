<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	
       
         /**
	 * @var string the d /* SEO Vars */
        public $pageTitle = 'StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups';
        public $pageDesc = 'We bring great talents to great startups. StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | Starup Careers | Startup Career';
        public $pageRobotsIndex = true;

        public $pageOgTitle = 'StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups';
        public $pageOgDesc = 'We bring great talents to great startups';
        //cannot work strangely
        public $pageOgImage = "/images/suj.png";
        
        /*
        efault layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        public function display_seo()
    {
    // STANDARD TAGS
    // -------------------------
    // Title/Desc
    echo "\t".'<title>',CHtml::encode($this->pageTitle),'</title>'.PHP_EOL;
    echo "\t".'<meta name="description" content="',CHtml::encode($this->pageDesc),'">'.PHP_EOL;

    // Option for NoIndex
    if ( $this->pageRobotsIndex == false ) {
        echo '<meta name="robots" content="noindex">'.PHP_EOL;
    }

    // OPEN GRAPH(FACEBOOK) META
    // -------------------------
    if ( !empty($this->pageOgTitle) ) {
        echo "\t".'<meta property="og:title" content="',CHtml::encode($this->pageOgTitle),'">'.PHP_EOL;
    }
    if ( !empty($this->pageOgDesc) ) {
        echo "\t".'<meta property="og:description" content="',CHtml::encode($this->pageOgDesc),'">'.PHP_EOL;
    }
    if ( !empty($this->pageOgImage) ) {
        echo "\t".'<meta property="og:image" content="'.Yii::app()->request->baseUrl.''.$this->pageOgImage.'">'.PHP_EOL;
    }
}
        
        
}