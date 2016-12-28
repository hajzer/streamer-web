<?php

// BH OFF -> class CardProfileController extends Controller
// BH ADD
class CardProfileController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
                 /* BH OFF 
			'accessControl', // perform access control for CRUD operations
                 BH OFF */
                 // BH ADD
                 	'rights',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CardProfile;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['CardProfile']))
		{
			$model->attributes=$_POST['CardProfile'];
			if($model->save())
			{	
				if (file_exists("/etc/dvblast/profiles/$model->id"))
                 		 { 
					$shell_output = shell_exec("/bin/rm /etc/dvblast/profiles/$model->id 2>&1");
                 		 }
                    
                                  	$command="";
					// frequency
                                         if (isset($model->frequency))
					$command.="-f $model->frequency ";

					// symbol rate
                                         if (isset($model->symbolrate) && $model->symbolrate!=NULL)
					$command.="-s $model->symbolrate ";

					// diseqc
                                         if (isset($model->diseqc))
                                         {
					$command_diseqc=CDiseqc::model()->findByPk($model->diseqc);
					$command.="-S $command_diseqc->name ";                                         
                                         }
                                         
					// lnbvoltage
                                         if (isset($model->lnbvoltage))
                                         {
                                         $command_lnbvoltage=CLnbvoltage::model()->findByPk($model->lnbvoltage);
					$command.="-v $command_lnbvoltage->value ";                                         
                                         }
                                         
					// modulation
                                         if (isset($model->modulation))
                                         {
					$command_modulation=CModulation::model()->findByPk($model->modulation);
						// ak je modulacia ina ako DVB-S pouzij ju
                                         	if ($model->modulation != 1)
	                                        $command.="-m $command_modulation->name ";
                                         }
                                         
					// highband (Force 22KHz pulses for High-band [DVB-S])
                                         if (isset($model->highband) && $model->highband==2)
					$command.="-p ";                                         

					// slowcam
                                         if (isset($model->slowcam) && $model->slowcam==2)
					$command.="-W ";                                         

					// ttl
                                         if (isset($model->ttl))
					$command.="-t $model->ttl ";                                         

					// epg
                                         if (isset($model->epg) && $model->epg==2)
					$command.="-e ";

					// streamtype
                                         // UDP = 1 , RTP = 2
                                         if (isset($model->streamtype) && $model->streamtype==1)
					$command.="-U ";

					// real time priority
                                         if (isset($model->priority))
					$command.="-i $model->priority ";           

					// control socket
					// $command.="-r /etc/dvblast/run/tmp/$model->id.sock ";
                                         
                                         // write config to file
                                         $shell_output = shell_exec("/bin/echo $command>/etc/dvblast/profiles/$model->id 2>&1");                              

				$this->redirect(array('view','id'=>$model->id));
                         }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
    
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CardProfile']))
		{
			$model->attributes=$_POST['CardProfile'];
			if($model->save())
                         {
				if (file_exists("/etc/dvblast/profiles/$model->id"))
                 		 { 
					$shell_output = shell_exec("/bin/rm /etc/dvblast/profiles/$model->id 2>&1");
                 		 }

                                  	$command="";
					// frequency
                                         if (isset($model->frequency))
					$command.="-f $model->frequency ";

					// symbol rate
                                         if (isset($model->symbolrate) && $model->symbolrate!=NULL)
					$command.="-s $model->symbolrate ";

					// diseqc
                                         if (isset($model->diseqc))
                                         {
					$command_diseqc=CDiseqc::model()->findByPk($model->diseqc);
					$command.="-S $command_diseqc->name ";                                         
                                         }
                                         
					// lnbvoltage
                                         if (isset($model->lnbvoltage))
                                         {
                                         $command_lnbvoltage=CLnbvoltage::model()->findByPk($model->lnbvoltage);
					$command.="-v $command_lnbvoltage->value ";                                         
                                         }
                                         
					// modulation
                                         if (isset($model->modulation))
                                         {
					$command_modulation=CModulation::model()->findByPk($model->modulation);
						// ak je modulacia ina ako DVB-S pouzij ju
                                         	if ($model->modulation != 1)
	                                        $command.="-m $command_modulation->name ";
                                         }
                                         
					// highband (Force 22KHz pulses for High-band [DVB-S])
                                         if (isset($model->highband) && $model->highband==2)
					$command.="-p ";                                         

					// slowcam
                                         if (isset($model->slowcam) && $model->slowcam==2)
					$command.="-W ";                                         

					// ttl
                                         if (isset($model->ttl))
					$command.="-t $model->ttl ";                                         

					// epg
                                         if (isset($model->epg) && $model->epg==2)
					$command.="-e ";

					// streamtype
                                         // UDP = 1 , RTP = 2
                                         if (isset($model->streamtype) && $model->streamtype==1)
					$command.="-U ";

					// real time priority
                                         if (isset($model->priority))
					$command.="-i $model->priority ";           

					// control socket
					// $command.="-r /etc/dvblast/run/tmp/$model->id.sock ";
                                         
                                         // write config to file
                                         $shell_output = shell_exec("/bin/echo $command>/etc/dvblast/profiles/$model->id 2>&1");                              
				  
				$this->redirect(array('view','id'=>$model->id));
                         }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

                         if (file_exists("/etc/dvblast/profiles/$id"))
			$shell_output = shell_exec("/bin/rm /etc/dvblast/profiles/$id 2>&1");

                         if (file_exists("/etc/dvblast/scripts/channels/$id"))
			$shell_output = shell_exec("/bin/rm /etc/dvblast/scripts/channels/$id 2>&1");                         
                         
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}


	public function actionIndex()
	{
		$model=new CardProfile('search');
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['CardProfile']))
		//	$model->attributes=$_GET['CardProfile'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
         
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CardProfile('search');
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['CardProfile']))
		//	$model->attributes=$_GET['CardProfile'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CardProfile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='card-profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}