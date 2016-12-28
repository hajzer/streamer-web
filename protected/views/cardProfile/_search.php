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
		<?php echo $form->label($model,'cardtype'); ?>
		<?php echo $form->textField($model,'cardtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'frequency'); ?>
		<?php echo $form->textField($model,'frequency'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'symbolrate'); ?>
		<?php echo $form->textField($model,'symbolrate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diseqc'); ?>
		<?php echo $form->textField($model,'diseqc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lnbvoltage'); ?>
		<?php echo $form->textField($model,'lnbvoltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modulation'); ?>
		<?php echo $form->textField($model,'modulation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'highband'); ?>
		<?php echo $form->textField($model,'highband'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'slowcam'); ?>
		<?php echo $form->textField($model,'slowcam'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ttl'); ?>
		<?php echo $form->textField($model,'ttl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'epg'); ?>
		<?php echo $form->textField($model,'epg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'streamtype'); ?>
		<?php echo $form->textField($model,'streamtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'priority'); ?>
		<?php echo $form->textField($model,'priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'multicastnetwork'); ?>
		<?php echo $form->textArea($model,'multicastnetwork',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->