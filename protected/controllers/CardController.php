<?php


class CardController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
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
		$model=new Card;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Card']))
		{
			$model->attributes=$_POST['Card'];
			if($model->save(true))
			{	
		                 $scan=Card::model()->with('BoardSlot')->findByPk($model->id);                 
				   $dvb_device=BoardSlot::model()->findByPk($scan->slot);
		                 if ($scan->streamautostart==2)
                 		 { 
					$shell_output = shell_exec("/bin/echo $scan->id_active_profile > /etc/dvblast/autostart/$dvb_device->dev 2>&1");                                                          
                 		 }
	               		 else
					$shell_output = shell_exec("/bin/rm /etc/dvblast/autostart/$dvb_device->dev 2>&1");                                         
                                         
                                 $this->redirect(array('view','id'=>$model->id));
                         }
                         else
                         {
                        	print_r($model->getErrors());
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

		if(isset($_POST['Card']))
		{
			$model->attributes=$_POST['Card'];
			if($model->save())
			{ 
		                 $scan=Card::model()->with('BoardSlot')->findByPk($model->id);
				 $dvb_device=BoardSlot::model()->findByPk($scan->slot);

				 // YES = 2, NO = 1
		                 if ($scan->streamautostart==2)
                 		 { 
					$shell_output = shell_exec("/bin/echo $scan->id_active_profile > /etc/dvblast/autostart/$dvb_device->dev 2>&1");                         
                 		 }
                 		 else
					$shell_output = shell_exec("/bin/rm /etc/dvblast/autostart/$dvb_device->dev 2>&1");

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
                 
                       $scan=Card::model()->with('BoardSlot')->findByPk($id);
			$dvb_device=BoardSlot::model()->findByPk($scan->slot);                         
			if (file_exists("/etc/dvblast/autostart/$dvb_device->dev"))
			$shell_output = shell_exec("/bin/rm /etc/dvblast/autostart/$dvb_device->dev 2>&1");

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

         
	public function actionIndex()
	{
		$model=new Card('search');
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['Card']))
		//	$model->attributes=$_GET['Card'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Card('search');
	//	$model->unsetAttributes();  // clear any default values
	//	if(isset($_GET['Card']))
	//		$model->attributes=$_GET['Card'];

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
		$model=Card::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='card-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

         
	public function actionScan($id)
         {
		$scan=Card::model()->with('BoardSlot')->findByPk($id);
		$dvb_device=BoardSlot::model()->findByPk($scan->slot);
		// Start dvblast
		shell_exec("/usr/bin/nohup /etc/dvblast/scripts/streamer-control.sh -s $dvb_device->dev $scan->id_active_profile > /dev/null & echo $!");
		sleep(10);
		// Scan for channels (scan)
		$shell_output = shell_exec("/etc/dvblast/scripts/streamer-scan.sh $dvb_device->dev $scan->id_active_profile 2>&1");
		// Stop dvblast
		$shell_output = shell_exec("/etc/dvblast/scripts/streamer-control.sh -k $dvb_device->dev 2>&1");

		
		$this->render('scan',array(
			'model'=>$scan,
		)); 
         }

         
	public function actionControl($id)
         {
		$model=$this->loadModel($id);

		$this->render('control',array(
			'model'=>$model,
			));

         }


	public function actionStreamStart()
         {
                 $id = $_GET['id'];
		   $model=$this->loadModel($id);
                 $dvb_device=BoardSlot::model()->findByPk($model->slot);                 
                 
                 // Start dvblast
                 shell_exec("/usr/bin/nohup /etc/dvblast/scripts/streamer-control.sh -s $dvb_device->dev $model->id_active_profile > /dev/null & echo $!");
                 echo "STREAMING ON CARD $id WAS STARTED ... ";
                 
                 
                 Yii::app()->end();
         }


	public function actionStreamStop()
         {
                 $id = $_GET['id'];
		$model=$this->loadModel($id);
                 $dvb_device=BoardSlot::model()->findByPk($model->slot);                 
                 
                 // Stop dvblast
                 $shell_output = shell_exec("/usr/bin/nohup /etc/dvblast/scripts/streamer-control.sh -k $dvb_device->dev 2>&1 & echo $!");

                 if (!is_null($shell_output))
                 {
			echo "STREAMING ON CARD $id WAS STOPPED ... ";
                 }

                 Yii::app()->end();
         }


	public function actionStreamRestart()
         {
                 $id = $_GET['id'];
		$model=$this->loadModel($id);
                 $dvb_device=BoardSlot::model()->findByPk($model->slot);                 
                 
                 // Stop dvblast
                 $shell_output = shell_exec("/etc/dvblast/scripts/streamer-control.sh -k $dvb_device->dev 2>&1");

                 // Start dvblast
                 shell_exec("/etc/dvblast/scripts/streamer-control.sh -s $dvb_device->dev $model->id_active_profile > /dev/null & echo $!");
                 if (!is_null($shell_output))
                 {
			echo "STREAMING ON CARD $id WAS RESTARTED ... ";
                 }                 
                 
                 Yii::app()->end();
         }


	public function actionStreamStatus()
         {
                 $id = $_GET['id'];
		$model=$this->loadModel($id);
                 $dvb_device=BoardSlot::model()->findByPk($model->slot);                 
                 
                 // dvblastctl status
                 $shell_output = shell_exec("/etc/dvblast/scripts/streamer-status.sh $dvb_device->dev 2>&1");
                 if (!is_null($shell_output))
                 {

			if (strpos($shell_output, "cannot send comm socket") == true)
                         {
                         	echo "STATUS INFORMATION FOR CARD $id IS UNREACHABLE ... (STREAMING ON CARD MUST BE STARTED.)";                         
                         } 
                         else
                         {       /*
	         		foreach (explode("\n", $shell_output) as $line)
	         		{
         				$l = explode(":", trim ($line));
					echo "$l[0] $l[1]<br>";
         			} 
                                 */
				echo "STATUS INFORMATION FOR CARD $id ... ";
                         	echo "<br><br>";
                         	echo "$shell_output";
                         }
                 }
                 
                 Yii::app()->end();
         }

         
	public function actionStreamStatusRun()
         {

                 $id = $_GET['id'];
		$model=$this->loadModel($id);
                 $dvb_device=BoardSlot::model()->findByPk($model->slot);                 
                 
                 // dvblast runtime status
                 $shell_output = shell_exec("/etc/dvblast/scripts/streamer-control.sh -c $dvb_device->dev 2>&1");
                 if (!is_null($shell_output))
                 {
			if (strpos($shell_output, "neexistuje") == true)
                         {
                 	echo "RUNTIME STREAMING STATUS ON CARD $id CAN'T BE REACHED ... (STREAMING ON CARD MUST BE STARTED.) ";
                         }
                         else
                         {
			echo "RUNTIME STREAMING STATUS ON CARD $id ... ";
                         echo "<br><br>";
                         echo "$shell_output";
                         }
                 }

                 Yii::app()->end();
         }         
         
         
         public function actionActivedevices()
         {
         	$shell_output=shell_exec("/etc/dvblast/scripts/streamer-activedevices.sh 2>&1");
                 $slot=BoardSlot::model()->findAll();
             
		$name_data = array();
         	foreach (explode("\n", $shell_output) as $line)
         	{
         		$l = explode(" ", trim ($line));
                 	if (isset($l[1]))
                         {
                         	foreach ($slot as $s)
                                 {
                                 	if (strpos($shell_output, $s->pciid) == true)
                 			$name_data[$l[0]] = $l[1];
                                 }
                         }
         	}         
	
         	return $name_data;
         }
         
}