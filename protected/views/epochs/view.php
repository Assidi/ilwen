<?php
/* @var $this EpochsController */
/* @var $model Epochs */

$this->breadcrumbs=array(
	'Эпохи'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список эпох', 'url'=>array('index')),
	array('label'=>'Новая эпоха', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->name;?> эпоха</h1>

<p><b>Идентификатор эпохи:</b> <?=$model->id?></p>
<p><b>Название эпохи: </b><?=$model->name?> эпоха</p>
