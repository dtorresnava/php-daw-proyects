<?php

//_menu.php
$items = array(
    //array('label' => 'Home', 'url' => array('/site/index')),
    array('label' => 'Actividades', 'url' => array('/actividades/index'), 'visible' => !Yii::app()->user->isGuest),
    array('label' => 'Salas', 'url' => array('/salas/index'), 'visible' => !Yii::app()->user->isGuest),
    array('label' => 'Grupos', 'url' => array('/grupos/index'), 'visible' => !Yii::app()->user->isGuest),
    array('label' => 'Dar de Alta', 'url' => array('/usuarios/create'),'visible' =>Yii::app()->user->isGuest),
    array('label' => 'Alumnos', 'url' => array('/usuarios/alumnos'), 'visible' => Yii::app()->user->name === 'admin'),
    array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
    array('label' => 'Contact', 'url' => array('/site/contact')),
    array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
);
