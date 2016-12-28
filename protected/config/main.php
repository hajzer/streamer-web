<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Streamer',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	// BH ADD - doplnime potrebne importy pre modul "yii-user"
		'application.modules.user.models.*',
		'application.modules.user.components.*',
	// BH ADD - doplnime potrebne importy pre modul "yii-rights"
		'application.modules.rights.*',
		'application.modules.rights.components.*',
	// BH ADD - doplnime potrebne importy pre Filter Remember funkcionalitu
	  'application.components.ERememberFiltersBehavior',
	),

	'modules'=>array(
		// BH ADD - doplnime modul "yii-user"
		'user',
                 // BH ADD - doplnime modul "yii-rights"
                 'rights'=>array(
                 	'superuserName'=>'Admin',
			'authenticatedName'=>'Authenticated',
			'userIdColumn'=>'id',
			'userNameColumn'=>'username',
			'baseUrl'=>'/rights',
			'install'=>false,
                         ),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('192.168.184.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
			// BH ADD - doplnime parameter pre modul "yii-user"
			'loginUrl' => array('/user/login'),
       			// BH ADD - doplnime parameter pre modul "yii-rights"
                         'class'=>'RWebUser',
		),
                 // BH ADD - doplnime parametre pre modul "yii-rights"
                 'authManager'=>array(
                 	'class'=>'RDbAuthManager'
                 ),
                 
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/streamer.db',
			// BH ADD - doplnime prefix (tbl_) pre tabulky v DB 
			'tablePrefix' => 'tbl_',
			'initSQLs' => array('PRAGMA foreign_keys=ON'),
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);