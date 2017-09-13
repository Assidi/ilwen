<?php
/* @var $this CharactersController */
/* @var $model Characters */

$this->breadcrumbs=array(
	'Персонажи'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список персонажей', 'url'=>array('index')),
	array('label'=>'Новый персонаж', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновление персонажа <?=$model->name;?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>