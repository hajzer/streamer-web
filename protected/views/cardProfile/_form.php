<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'card-profile-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cardtype'); ?>
		<?php echo $form->dropDownList($model, 'cardtype', CHtml::listData(CardType::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'cardtype'); ?>
	</div>         
         
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency'); ?>
		<?php echo $form->textField($model,'frequency'); ?>
		<?php echo $form->error($model,'frequency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'symbolrate'); ?>
		<?php echo $form->textField($model,'symbolrate'); ?>
		<?php echo $form->error($model,'symbolrate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diseqc'); ?>
		<?php /* LH OFF -> echo $form->textField($model,'diseqc'); */ ?>
		<?php echo $form->dropDownList($model, 'diseqc', CHtml::listData(CDiseqc::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'diseqc'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'lnbvoltage'); ?>
		<?php /* LH OFF ->  echo $form->textField($model,'lnb_voltage'); */ ?>
		<?php echo $form->dropDownList($model, 'lnbvoltage', CHtml::listData(CLnbvoltage::model()->findAll(), 'id', 'value')); ?>
		<?php echo $form->error($model,'lnbvoltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modulation'); ?>
		<?php /* LH OFF -> echo $form->textArea($model,'modulation',array('rows'=>6, 'cols'=>50)); */ ?>
		<?php echo $form->dropDownList($model, 'modulation', CHtml::listData(CModulation::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'modulation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'highband'); ?>
		<?php /* LH OFF -> echo $form->textField($model,'epg'); */ ?>
		<?php echo $form->dropDownList($model, 'highband', CHtml::listData(CAnswer::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'highband'); ?>
	</div>         

	<div class="row">
		<?php echo $form->labelEx($model,'slowcam'); ?>
		<?php /* LH OFF -> echo $form->textField($model,'epg'); */ ?>
		<?php echo $form->dropDownList($model, 'slowcam', CHtml::listData(CAnswer::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'slowcam'); ?>
	</div>         
         
	<div class="row">
		<?php echo $form->labelEx($model,'epg'); ?>
		<?php /* LH OFF -> echo $form->textField($model,'epg'); */ ?>
		<?php echo $form->dropDownList($model, 'epg', CHtml::listData(CAnswer::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'epg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'streamtype'); ?>
		<?php /* LH OFF -> echo $form->textField($model,'stream'); */ ?>
		<?php echo $form->dropDownList($model, 'streamtype', CHtml::listData(CStreamtype::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'streamtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ttl'); ?>
		<?php echo $form->textField($model,'ttl'); ?>
		<?php echo $form->error($model,'ttl'); ?>
	</div>         
         
	<div class="row">
		<?php echo $form->labelEx($model,'priority'); ?>
		<?php echo $form->textField($model,'priority'); ?>
		<?php echo $form->error($model,'priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'multicastnetwork'); ?>
		<?php echo $form->textField($model,'multicastnetwork'); ?>
		<?php echo $form->error($model,'multicastnetwork'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->