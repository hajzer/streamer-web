<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cmodulation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_card_type'); ?>
		<?php echo $form->textField($model,'id_card_type'); ?>
		<?php echo $form->error($model,'id_card_type'); ?>
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