<?php
//index.php
$yii=dirname(__FILE__).'/../../yii-1.1.16/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
 
defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
 
require_once($yii);
$app=Yii::createWebApplication($config);
 
function client(){
	if(strpos($_SERVER['HTTP_USER_AGENT'],'Android')) //Se puede ampliar para detectar MACOS
		return "mobile";
	else
		return "pc";
}
 
// ASIGNA TEMA
$theme='';
if(isset($_GET['theme'])) {
	$theme=$_GET['theme'];
    
	$app->user->setstate('theme',$theme);
} elseif(isset(Yii::app()->user->theme)){
	$theme=$app->user->theme;
}elseif(client()=='mobile')
	$theme='bootstrap';
else
        $theme='bootstrap';
 
$app->theme=$theme;
if($theme=='bootstrap')
	$app->getComponent("booster");
 
 
$app->run();