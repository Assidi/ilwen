<?php
/* @var $this BooksController */
/* @var $model Books */

$this->breadcrumbs=array(
	'Книги'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список книг', 'url'=>array('index')),
	array('label'=>'Новая книга', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->name;?></h1>

<p><b>Идентификатор книги:</b> <?=$model->id?></p>
<p><b>Название книги: </b><?=$model->name?></p>