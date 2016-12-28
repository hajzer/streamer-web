<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'card-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cardtype'); ?>
		<?php echo $form->dropDownList($model, 'cardtype', CHtml::listData(CardType::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'cardtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slot'); ?>
		<?php echo $form->dropDownList($model, 'slot', CHtml::listData(BoardSlot::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'slot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_active_profile'); ?>
		<?php echo $form->dropDownList($model, 'id_active_profile', CHtml::listData(CardProfile::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'id_active_profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'streamautostart'); ?>
		<?php /* BH OFF -> echo $form->textField($model,'stream_autostart'); */ ?>
		<?php echo $form->dropDownList($model, 'streamautostart', CHtml::listData(CAnswer::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'streamautostart'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->