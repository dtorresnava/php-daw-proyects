<?php
    $this->breadcrumbs=array(
            'Usuarios'=>array('index'),
            'Create',
    );

    $this->menu=array(
    array('label'=>'List Usuarios','url'=>array('index'), 'visible'=>Yii::app()->user->name=='admin'),
    array('label'=>'Manage Usuarios','url'=>array('admin'), 'visible'=>Yii::app()->user->name=='admin'),
    );
?>

<h1>Create Usuarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>