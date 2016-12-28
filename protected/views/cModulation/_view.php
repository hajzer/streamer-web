<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_card_type')); ?>:</b>
	<?php echo CHtml::encode($data->id_card_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dev')); ?>:</b>
	<?php echo CHtml::encode($data->dev); ?>
	<br />


</div>