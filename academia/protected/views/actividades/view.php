<?php
$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'Lista de Actividades','url'=>array('index')),
array('label'=>'Alta de Actividades','url'=>array('create')),
array('label'=>'Modificar Actividad','url'=>array('update','id'=>$model->id)),
array('label'=>'Borrar Actividad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Control de Actividades','url'=>array('admin')),
);
?>

<h1>Detalle: <?php echo $model->actividad; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'actividad',
		'detalle',
),
)); ?>
