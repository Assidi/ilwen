<?php
/* @var $this CharactersController */
/* @var $model Characters */

$this->breadcrumbs=array(
	'Персонажи'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список персонажей', 'url'=>array('index')),
	array('label'=>'Новый персонаж', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить этого персонажа?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->name;?></h1>

<p><b>Идентификатор персонажа:</b> <?=$model->id?></p>
<p><b>Имя персонажа: </b><?=$model->name?></p>
<p><b>Народ: </b><?=$model->race0->name;?></p>

