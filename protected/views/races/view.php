<?php
/* @var $this RacesController */
/* @var $model Races */

$this->breadcrumbs=array(
	'Народы'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список народов', 'url'=>array('index')),
	array('label'=>'Новый народ', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->name;?></h1>

<p><b>Идентификатор:</b> <?=$model->id?></p>
<p><b>Название: </b><?=$model->name?></p>