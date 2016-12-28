<?php

class LogoutController extends RController
{
	public $defaultAction = 'logout';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
                return array(
                        //'accessControl', // perform access control for CRUD operations
                        'rights',
                );
	}
	
	/**
	 * Logout the current user and redirect to returnLogoutUrl.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->controller->module->returnLogoutUrl);
	}

}