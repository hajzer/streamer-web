<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frequency')); ?>:</b>
	<?php echo CHtml::encode($data->frequency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('symbol_rate')); ?>:</b>
	<?php echo CHtml::encode($data->symbol_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diseqc')); ?>:</b>
	<?php echo CHtml::encode($data->diseqc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ttl')); ?>:</b>
	<?php echo CHtml::encode($data->ttl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lnb_voltage')); ?>:</b>
	<?php echo CHtml::encode($data->lnb_voltage); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modulation')); ?>:</b>
	<?php echo CHtml::encode($data->modulation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('epg')); ?>:</b>
	<?php echo CHtml::encode($data->epg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stream')); ?>:</b>
	<?php echo CHtml::encode($data->stream); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priority')); ?>:</b>
	<?php echo CHtml::encode($data->priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('multicast_network')); ?>:</b>
	<?php echo CHtml::encode($data->multicast_network); ?>
	<br />

	*/ ?>

</div>