<?php
/* @var $this GruposController */
/* @var $model Grupos */

$this->breadcrumbs=array(
	'Gruposes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Grupos', 'url'=>array('index')),
	array('label'=>'Create Grupos', 'url'=>array('create')),
	array('label'=>'Update Grupos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Grupos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Grupos', 'url'=>array('admin')),
);
?>

<h1>View Grupos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'actividades_id',
		'fecha_inicio',
		'fecha_fin',
		'dias_semana',
		'horario',
		'estado',
		'cuota',
		'profesor_id',
		'salas_id',
		'plazas',
	),
)); ?>
