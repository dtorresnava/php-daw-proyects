<?php
$this->breadcrumbs=array(
	'Salas',
);

$this->menu=array(
array('label'=>'Alta de Salas','url'=>array('create')),
array('label'=>'Modificar Salas','url'=>array('admin')),
);
?>

<h1>Salas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
