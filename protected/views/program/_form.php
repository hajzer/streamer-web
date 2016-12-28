<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'program-form',
	'enableAjaxValidation'=>true,
)); ?>



	<p class="note"></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_profile'); ?>
		<?php
		// LH - Ak sa jedna o novy zaznam tak pouzij dynamicNameNew inak pouzij dynamicName
		if ($model->isNewRecord)
		{
          echo $form->dropDownList($model, 'id_profile', CHtml::listData(CardProfile::model()->findAll(), 'id', 'name'),
                 	array(
                         'prompt'=>'-Select Card Profile-',
                         'onchange'=>CHtml::ajax (
                         	array(
                             	'type'=>'POST',
                                 'url'=>CController::createUrl("dynamicNameNew"),
                                 //'data'=>array('id_profile'=>'$model->id_profile','id_program'=>$model->id),
                                 //'data'=>array('Program[id_profile]'=>'js:$(\'#program_id_profile\').val()'),
                                 //'params'=>array('id_mapel'=>'test'),
                                //'data' => "js:$('#program-form').serialize()",
                         	'update'=>'#' . CHtml::activeId($model, 'name'),
                                 )
                               )
                         )
                         ); 
    }
    else 
    {
          echo $form->dropDownList($model, 'id_profile', CHtml::listData(CardProfile::model()->findAll(), 'id', 'name'),
                 	array(
                         'prompt'=>'-Select Card Profile-',
                         'onchange'=>CHtml::ajax (
                         	array(
                             	'type'=>'POST',
                                 'url'=>CController::createUrl("dynamicName"),
                                 //'data'=>array('id_profile'=>'$model->id_profile','id_program'=>$model->id),
                                 //'data'=>array('Program[id_profile]'=>'js:$(\'#program_id_profile\').val()'),
                                 //'params'=>array('id_mapel'=>'test'),
                                //'data' => "js:$('#program-form').serialize()",
                         	'update'=>'#' . CHtml::activeId($model, 'name'),
                                 )
                               )
                         )
                         );     
    }
    ?>
    
		<?php echo $form->error($model,'id_profile'); ?>
	</div>

         <?php 
         // echo '<script>$("select").change(function () { $("select option:selected").each(function () { });  }).change();</script>';
         ?>

         
	<div class="row">
	
	<?php 
  // LH ADD - skryte pole - ID programu
  echo $form->hiddenField($model,'id'); 

 

  ?>


	
		<?php echo $form->labelEx($model,'name'); ?>
		<?php /* echo $form->textField($model,'name'); */ ?>

		<?php 
    
		// LH - Ak sa jedna o novy zaznam tak pouzij dynamicPidNew inak pouzij dynamicPid
		if ($model->isNewRecord)
		{    
      echo $form->dropDownList($model, 'name', array(),
                 	array(
                         //'options'=>array(2=>array('selected'=>'selected')),
                         //'prompt'=>'-Select Program-',
                         'onchange'=>CHtml::ajax (
                         	array(
                             	'type'=>'POST',
                                 'url'=>CController::createUrl("dynamicPidNew"),
                         	'update'=>'#' . CHtml::activeId($model, 'pid'),
                                 )
                               )
                         )
                         );                 
    }
    else
    {
      echo $form->dropDownList($model, 'name', array(),
                 	array(
                         //'options'=>array(2=>array('selected'=>'selected')),
                         //'prompt'=>'-Select Program-',
                         'onchange'=>CHtml::ajax (
                         	array(
                             	'type'=>'POST',
                                 'url'=>CController::createUrl("dynamicPid"),
                         	'update'=>'#' . CHtml::activeId($model, 'pid'),
                                 )
                               )
                         )
                         );    
    }                     
    ?>
                                          
		<?php echo $form->error($model,'name'); ?>
	</div>

         <?php 
         //echo '<script>$("select").change(function () { $("select option:selected").each(function () { });  }).change();</script>';
         ?>
         
         
	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList($model, 'pid', array()); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>

         <?php 
         //echo '<script>$("select").change(function () { $("select option:selected").each(function () { });  }).change();</script>';
         ?>         
         
	<div class="row">
		<?php echo $form->labelEx($model,'multicast_ip'); ?>
		<?php echo $form->textField($model,'multicast_ip'); ?>
		<?php echo $form->error($model,'multicast_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'multicast_port'); ?>
		<?php echo $form->textField($model,'multicast_port'); ?>
		<?php echo $form->error($model,'multicast_port'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stream'); ?>
		<?php echo $form->dropDownList($model, 'stream', CHtml::listData(CAnswer::model()->findAll(), 'id', 'name')); ?>
                 <?php echo $form->error($model,'stream'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


         
<?php $this->endWidget(); ?>


</div><!-- form -->