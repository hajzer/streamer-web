<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_profile')); ?>:</b>
	<?php echo CHtml::encode($data->id_profile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo CHtml::encode($data->pid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('multicast_ip')); ?>:</b>
	<?php echo CHtml::encode($data->multicast_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('multicast_port')); ?>:</b>
	<?php echo CHtml::encode($data->multicast_port); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stream')); ?>:</b>
	<?php echo CHtml::encode($data->stream); ?>
	<br />


</div>