<?php
/* @var $this TextsController */
/* @var $dataProvider CActiveDataProvider */
/* @var $epoch номер текущей эпохи */
$epoch = Epochs::getEpoch($epochid); 
$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	$epoch->name.' эпоха',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>


<h1><?=$epoch->name; ?> эпоха </h1>
<img src="/images/<?= $epoch->picture; ?>"/>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
