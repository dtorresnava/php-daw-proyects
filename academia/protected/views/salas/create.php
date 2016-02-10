<?php
$this->breadcrumbs=array(
	'Salas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Lista de Salas','url'=>array('index')),
array('label'=>'Modificar Salas','url'=>array('admin')),
);
?>

<h1>Crear Salas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>