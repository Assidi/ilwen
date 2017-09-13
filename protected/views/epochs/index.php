<?php
/* @var $this EpochsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Эпохи',
);

$this->menu=array(
	array('label'=>'Новая эпоха', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Эпохи</h1>

<? foreach ($models as $model): ?>
    <p><a href="<?= $model->id; ?>"><?= $model->name; ?> эпоха</a></p>
<? endforeach; ?>
