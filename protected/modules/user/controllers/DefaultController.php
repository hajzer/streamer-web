<?php

class DefaultController extends RController
{

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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'status>'.User::STATUS_BANED,
		    ),
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('/user/index',array(
			'dataProvider'=>$dataProvider,
		));
	}
   
}