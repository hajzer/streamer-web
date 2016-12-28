<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pciid')); ?>:</b>
	<?php echo CHtml::encode($data->pciid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dev')); ?>:</b>
	<?php echo CHtml::encode($data->dev); ?>
	<br />


</div>