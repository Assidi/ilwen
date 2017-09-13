<?php
/* @var $this GenresController */
/* @var $model Genres */

$this->breadcrumbs=array(
	'Жанры'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список жанров', 'url'=>array('index')),
	array('label'=>'Новый жанр', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить этот жанр?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->name;?></h1>

<p><b>Идентификатор жанра:</b> <?=$model->id?></p>
<p><b>Название жанра: </b><?=$model->name?></p>

