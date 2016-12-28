<?php
$this->breadcrumbs=array(
	'Cards'=>array('index'),
	'Control',
);

$dvb_device=BoardSlot::model()->findByPk($model->slot);
?>

<h1>Control: <?php echo "$model->name"; echo " in slot: $dvb_device->name (/dev/dvb/adapter$dvb_device->dev)"; ?> </h1>
<li><?php echo CHtml::link(('List Cards'),array('/card')); ?></li> 

<?php echo "</br></br>"; ?>
<?php

	$form=$this->beginWidget('CActiveForm', array( 'id'=>'form1',) );


  	echo CHtml::imageButton(Yii::app()->request->baseUrl.'/images/start.png', array(
		'ajax' => array(
			'type'=>'GET',
			'url'=>CController::createUrl('StreamStart', array('id'=>$model->id)),
			'update'=>'#Status',
                 	),
		//'htmlOptions'=>array('width'=>'80px')
                 )
         );
?>
&nbsp;&nbsp;&nbsp;

<?php         
  	echo CHtml::imageButton(Yii::app()->request->baseUrl.'/images/stop.png', array(
		'ajax' => array(
			'type'=>'GET',
			'url'=>CController::createUrl('StreamStop', array('id'=>$model->id)),
			'update'=>'#Status',
                 	),
		//'htmlOptions'=>array('width'=>'80px')
                 )
         );
         
?>
&nbsp;&nbsp;&nbsp;

<?php         
  	echo CHtml::imageButton(Yii::app()->request->baseUrl.'/images/restart.png', array(
		'label'=>'Restart',
                 'ajax' => array(
			'type'=>'GET',
			'url'=>CController::createUrl('StreamRestart', array('id'=>$model->id)),
			'update'=>'#Status'
                 	),
                 )
         );
?>

&nbsp;&nbsp;&nbsp;

<?php         
  	echo CHtml::imageButton(Yii::app()->request->baseUrl.'/images/statusrun.png', array(
                 'ajax' => array(
			'type'=>'GET',
			'url'=>CController::createUrl('StreamStatusRun', array('id'=>$model->id)),
			'update'=>'#Status'
                 	),
                 )
         );
?>

&nbsp;&nbsp;&nbsp;

<?php         
  	echo CHtml::imageButton(Yii::app()->request->baseUrl.'/images/status.png', array(
                 'ajax' => array(
			'type'=>'GET',
			'url'=>CController::createUrl('StreamStatus', array('id'=>$model->id)),
			'update'=>'#Status'
                 	),
                 )
         );
?>


</br></br>
<div id="Status"></div>

<?php $this->endWidget();        ?>