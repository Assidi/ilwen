<?php
/* @var $this TextsController */
/* @var $dataProvider CActiveDataProvider */
/* @var $raceid номер текущей расы */
$race = Races::getRace($raceid); 
$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	$race->name,
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>


<h1><?=$race->name; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
