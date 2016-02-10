<?php
/* @var $this GruposController */
/* @var $data Grupos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actividades_id')); ?>:</b>
	<?php echo CHtml::encode($data->actividades_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dias_semana')); ?>:</b>
	<?php echo CHtml::encode($data->dias_semana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horario')); ?>:</b>
	<?php echo CHtml::encode($data->horario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cuota')); ?>:</b>
	<?php echo CHtml::encode($data->cuota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesor_id')); ?>:</b>
	<?php echo CHtml::encode($data->profesor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salas_id')); ?>:</b>
	<?php echo CHtml::encode($data->salas_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plazas')); ?>:</b>
	<?php echo CHtml::encode($data->plazas); ?>
	<br />

	*/ ?>

</div>