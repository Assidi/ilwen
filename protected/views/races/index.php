<?php
/* @var $this RacesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Народы',
);

$this->menu=array(
	array('label'=>'Новый народ', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Народы</h1>

<? foreach ($models as $model): ?>
    <p><a href="<?= $model->id; ?>"><?= $model->name; ?></a></p>
<? endforeach; ?>

