<?php
/* @var $this RacesController */
/* @var $model Races */

$this->breadcrumbs=array(
	'Народы'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список народов', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый народ</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>