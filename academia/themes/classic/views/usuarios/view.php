<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Usuarios', 'url'=>array('index'), 'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Create Usuarios', 'url'=>array('create'), 'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Update Usuarios', 'url'=>array('update', 'id'=>$model->id), 'visible'=>Yii::app()->user->name=='admin'),
	array('label'=>'Delete Usuarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->id==$model->id),
	array('label'=>'Manage Usuarios', 'url'=>array('admin'), 'visible'=>Yii::app()->user->name=='admin'),
);
?>

<h1>Informacion del usuario <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'usuario',
		'nombre',
		'email',
		//'password',
		'fecha_alta',
		'estado',
		'telefono',
		'origen',
		'observ',
		'ult_fecha',
		'roles',
	),
       
)); 
?>
