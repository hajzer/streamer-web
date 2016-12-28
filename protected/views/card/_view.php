<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dev')); ?>:</b>
	<?php echo CHtml::encode($data->dev); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pci_id')); ?>:</b>
	<?php echo CHtml::encode($data->pci_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_active_profile')); ?>:</b>
	<?php echo CHtml::encode($data->id_active_profile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stream_autostart')); ?>:</b>
	<?php echo CHtml::encode($data->stream_autostart); ?>
	<br />


</div>