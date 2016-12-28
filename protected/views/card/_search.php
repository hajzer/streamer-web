<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
 	</div>

	<div class="row">
		<?php echo $form->label($model,'slot'); ?>
		<?php echo $form->textArea($model,'slot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_active_profile'); ?>
		<?php echo $form->textField($model,'id_active_profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'streamautostart'); ?>
		<?php echo $form->textField($model,'streamautostart'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->