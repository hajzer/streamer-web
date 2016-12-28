<?php

class LogController extends RController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionShow()
	{

		$this->render('show');
	}


	// Uncomment the following methods and override them if needed
	
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
		              'rights',
		);
	}
  /*
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

}