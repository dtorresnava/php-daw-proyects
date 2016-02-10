<?php
$this->breadcrumbs=array(
	'Actividades',
);

$this->menu=array(
array('label'=>'Alta de Actividades','url'=>array('create')),
array('label'=>'Control de Actividades','url'=>array('admin')),
);
?>

<h1>Actividades</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
