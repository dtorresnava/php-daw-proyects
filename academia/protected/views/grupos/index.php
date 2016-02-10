<?php
$this->breadcrumbs=array(
	'Gruposes',
);

$this->menu=array(
array('label'=>'Create Grupos','url'=>array('create')),
array('label'=>'Manage Grupos','url'=>array('admin')),
);
?>

<h1>Gruposes</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
