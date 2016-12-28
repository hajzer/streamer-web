<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'board-slot-form',
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
		<?php echo $form->labelEx($model,'pciid'); ?>
		<?php echo $form->textField($model,'pciid'); ?>
		<?php echo $form->error($model,'pciid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dev'); ?>
		<?php echo $form->textField($model,'dev'); ?>
		<?php echo $form->error($model,'dev'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->