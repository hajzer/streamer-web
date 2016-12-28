<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainMbMenu">           
		<?php /* LH OFF stare menu
                 	 $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Project Manager', 'url'=>array('/site/index')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			// LH ADD                        
				array('label'=>'Projects', 'url'=>array('/project'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Customers', 'url'=>array('/customer'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Employees', 'url'=>array('/employee'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Activities', 'url'=>array('/activity'), 'visible'=>!Yii::app()->user->isGuest),

				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); */ 
                 
                 // LH ADD nove menu (dropdown) - mbmenu
		$this->widget('application.extensions.mbmenu.MbMenu',array( 
		'items'=>array( 
			array('label'=>'Streamer', 'url'=>array('/site/index')),
			// BH OFF
                         /*
                         array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'Organization', 'visible'=>!Yii::app()->user->isGuest,
                 		'items'=>array(
                         	array('label'=>'Divisions', 'url'=>array('/division')),
                                 array('label'=>'Departments', 'url'=>array('/department')),
                                 array('label'=>'Employees', 'url'=>array('/employee')),
				),                
			),
			array('label'=>'Customers', 'visible'=>!Yii::app()->user->isGuest,
                 		'items'=>array(
                         	array('label'=>'Customers', 'url'=>array('/customer')),
                                 array('label'=>'Customer Types', 'url'=>array('/customerType')),
                                 array('label'=>'Contacts', 'url'=>array('/customerContact')),
				),                
			),
			array('label'=>'Projects', 'url'=>array('/project'), 'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'Activities', 'url'=>array('/activity'), 'visible'=>!Yii::app()->user->isGuest),                         
			array('label'=>'Configuration', 'visible'=>!Yii::app()->user->isGuest,
                 		'items'=>array(
                         	array('label'=>'Rights', 'url'=>array('/rights')),
				),                
			),
			array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),                         
                         BH OFF */

                         // BH ADD - STREAMER
			array('label'=>'Streamer Configuration', 'visible'=>!Yii::app()->user->isGuest,
                 		'items'=>array(
                         	array('label'=>'DVB Cards', 'url'=>array('/card')), 
                         	array('label'=>'DVB Cards Profiles', 'url'=>array('/cardProfile')), 
                         	array('label'=>'DVB Programs', 'url'=>array('/program')), 
				),                
			),                         
                         
			// BH ADD - LOGIN
			array('label'=>Yii::app()->getModule('user')->t("Login"), 'url'=>Yii::app()->getModule('user')->loginUrl, 'visible'=>Yii::app()->user->isGuest),

                         // BH ADD - CONFIGURATION
			array('label'=>'System Configuration', 'visible'=>!Yii::app()->user->isGuest,
                 		'items'=>array(
                         	array('label'=>'Users', 'url'=>array('/user')),
                         	array('label'=>'Rights', 'url'=>array('/rights')),
                         	array('label'=>'Logs', 'url'=>array('/log')),
                         	array('label'=>'BoardSlots', 'url'=>array('/boardSlot')),
				),                
			),
                         
			// BH ADD - LOGOUT
                         array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),      
            ), 
    ));                 
                 
                 
                 ?>
	</div>   <!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		 Streamer (version 0.1.1)<br> <?php echo date('Y'); ?> Ladislav Hajzer (support by Peter Palla)<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>