<?php

class ProgramController extends RController
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
				'actions'=>array('create','update','dynamicname','dynamicpid'),
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
		$model=new Program;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Program']))
		{
			$model->attributes=$_POST['Program'];
			if($model->save())
                         {
                                 $programs=Program::model()->findAllByAttributes(array('id_profile'=>$model->id_profile));
				if (file_exists("/etc/dvblast/channels/$model->id_profile"))
					$shell_output = shell_exec("/bin/rm /etc/dvblast/channels/$model->id_profile 2>&1");

                         	foreach($programs as $program)
                         	{
                                 	// YES = 2, NO = 1
                                 	if ($program->stream == 2)
		                 	$shell_output = shell_exec("/bin/echo '$program->multicast_ip:$program->multicast_port 1 $program->pid' >> /etc/dvblast/channels/$model->id_profile 2>&1");
                                 }
                         
				$this->redirect(array('view','id'=>$model->id,'id_profile'=>$model->id_profile));
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
                 $old_profile=$model->id_profile;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Program']))
		{
			$model->attributes=$_POST['Program'];
			if($model->save())
                         {
                                 $programs=Program::model()->findAllByAttributes(array('id_profile'=>$model->id_profile));
				if (file_exists("/etc/dvblast/channels/$model->id_profile"))
					$shell_output = shell_exec("/bin/rm /etc/dvblast/channels/$model->id_profile 2>&1");

                                 // Naplnime povodny profil novym obsahom programov
                         	foreach($programs as $program)
                         	{
                                 	if ($program->stream == 2)
		                 	$shell_output = shell_exec("/bin/echo '$program->multicast_ip:$program->multicast_port 1 $program->pid' >> /etc/dvblast/channels/$model->id_profile 2>&1");
                                 }

				// Ak sa zmenil v ramci programu aj profil ku ktoremu patri tak naplnime aj novy profil novym obsahom programov
                                 if ($model->id_profile != $old_profile)
				{
                                 	if (file_exists("/etc/dvblast/channels/$old_profile"))
					$shell_output = shell_exec("/bin/rm /etc/dvblast/channels/$old_profile 2>&1");
                                         
                                 	$programs_old=Program::model()->findAllByAttributes(array('id_profile'=>$old_profile));

                         		foreach($programs_old as $program)
                         		{
                                 		if ($program->stream == 2)
		                 		$shell_output = shell_exec("/bin/echo '$program->multicast_ip:$program->multicast_port 1 $program->pid' >> /etc/dvblast/channels/$old_profile 2>&1");
                                 	}                                 
                                 }

				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
         
		echo '<script>$("select").change(function () { $("select option:selected").each(function () { });  }).change();</script>';



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

			$del_program=Program::model()->findByPk($id);
                        
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

                       	$programs=Program::model()->findAllByAttributes(array('id_profile'=>$del_program->id_profile));                          

			if (file_exists("/etc/dvblast/channels/$del_program->id_profile"))
				$shell_output = shell_exec("/bin/rm /etc/dvblast/channels/$del_program->id_profile 2>&1");
                         
                         foreach($programs as $program)
                         {
                                	if ($program->stream == 2)
		               	$shell_output = shell_exec("/bin/echo '$program->multicast_ip:$program->multicast_port 1 $program->pid' >> /etc/dvblast/channels/$del_program->id_profile 2>&1");
                         }                                                  
                         
                         
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
                         {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                         }
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	/* BH OFF          
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Program');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	BH OFF */
         // BH ADD
	public function actionIndex()
	{
		$model=new Program('search');
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['Program']))
		//	$model->attributes=$_GET['Program'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}         
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Program('search');
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['Program']))
		//	$model->attributes=$_GET['Program'];

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
		$model=Program::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='program-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

         
	public function actionDynamicName()
	{
	$id = $_POST['Program']['id_profile'];
	$id_program = $_POST['Program']['id'];
  $model2=Program::model()->findByPk($id_program);



	if ($id != 0  && file_exists("/etc/dvblast/scripts/channels/$id") )
         {
	$shell_output=shell_exec("/bin/cat /etc/dvblast/scripts/channels/$id 2>&1");

         echo CHtml::tag('option', array('value' => ''), CHtml::encode('-Select Program-'), true);
                                 
	$name_data = array();
         //$i = 0;
         foreach (explode("\n", $shell_output) as $line)
         {
         	$l = explode(" ", trim ($line));
                 if (isset($l[1]))
                 	$name_data[$l[0]] = $l[0]." (SID: ".$l[1].")";
         }
         // echo CHtml::activeDropDownList($model,'name', $name_data, array('prompt'=>'Select Program')).'</td>';
         

         foreach($name_data as $value=>$name)
         {
         if ($model2->name == $value)
            echo CHtml::tag('option',array('value'=>$value, 'selected' => 'selected'),CHtml::encode($name),true);         
         else
            echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);

	// $form->dropDownList($model,'sex',array('1'=>'men','2'=>'women'), array('options' => array('2'=>array('selected'=>true))));

         }

         }                             
	}         


  public function actionDynamicNameNew()
	{
	$id = $_POST['Program']['id_profile'];
	if ($id != 0  && file_exists("/etc/dvblast/scripts/channels/$id") )
         {
	$shell_output=shell_exec("/bin/cat /etc/dvblast/scripts/channels/$id 2>&1");

         echo CHtml::tag('option', array('value' => 0), CHtml::encode('-Select Program-'), true);
                                 
	$name_data = array();
         //$i = 0;
         foreach (explode("\n", $shell_output) as $line)
         {
         	$l = explode(" ", trim ($line));
                 if (isset($l[1]))
                 	$name_data[$l[0]] = $l[0]." (SID: ".$l[1].")";
         }
         // echo CHtml::activeDropDownList($model,'name', $name_data, array('prompt'=>'Select Program')).'</td>';
         

         foreach($name_data as $value=>$name)
         {
         echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);

	// $form->dropDownList($model,'sex',array('1'=>'men','2'=>'women'), array('options' => array('2'=>array('selected'=>true))));

         }

         }
                            
	}


	public function actionDynamicPid()
	{
	$id = $_POST['Program']['id_profile'];
	$id_program = $_POST['Program']['id'];
  $model2=Program::model()->findByPk($id_program);
  
	if ($id != 0 && file_exists("/etc/dvblast/scripts/channels/$id"))
         {
	$shell_output=shell_exec("/bin/cat /etc/dvblast/scripts/channels/$id 2>&1");
         echo CHtml::tag('option', array('value' => ''), CHtml::encode('-Select Sid-'), true);

	$name_data = array();
         foreach (explode("\n", $shell_output) as $line)
         {
         	$l = explode(" ", trim ($line));
                 if (isset($l[1]))
                 	$name_data[$l[1]] = $l[1]." (Program: ".$l[0].")";
         }

         foreach($name_data as $value=>$name)
         {
          if ($model2->pid == $value)
              echo CHtml::tag('option',array('value'=>$value, 'selected' => 'selected'),CHtml::encode($name),true);
          else 
              echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
         }
         }
	} 

	public function actionDynamicPidNew()
	{
	$id = $_POST['Program']['id_profile'];
	if ($id != 0 && file_exists("/etc/dvblast/scripts/channels/$id"))
         {
	$shell_output=shell_exec("/bin/cat /etc/dvblast/scripts/channels/$id 2>&1");
         echo CHtml::tag('option', array('value' => 0), CHtml::encode('-Select Sid-'), true);

	$name_data = array();
         foreach (explode("\n", $shell_output) as $line)
         {
         	$l = explode(" ", trim ($line));
                 if (isset($l[1]))
                 	$name_data[$l[1]] = $l[1]." (Program: ".$l[0].")";
         }

         foreach($name_data as $value=>$name)
         {
         echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
         }
         }
	}


         
}