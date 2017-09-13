<?php
/* @var $this EpochsController */
/* @var $model Epochs */

$this->breadcrumbs=array(
	'Эпохи'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новая эпоха</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>