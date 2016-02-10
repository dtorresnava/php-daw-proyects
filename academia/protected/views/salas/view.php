<?php
$this->breadcrumbs=array(
	'Salases'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'Lista de Salas','url'=>array('index')),
array('label'=>'Alta de Salas','url'=>array('create')),
array('label'=>'Modificar la Sala','url'=>array('update','id'=>$model->id)),
array('label'=>'Borrar la Salas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Control de Salas','url'=>array('admin')),
);
?>

<h1>Detalle de la Sala: <?php echo $model->nombre; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
),
)); ?>
