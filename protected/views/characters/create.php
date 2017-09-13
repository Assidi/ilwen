<?php
/* @var $this CharactersController */
/* @var $model Characters */

$this->breadcrumbs=array(
	'Персонажи'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список персонажей', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый персонаж</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>