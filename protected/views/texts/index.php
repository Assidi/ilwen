<?php
/* @var $this TextsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Тексты',
);

$this->menu=array(
	array('label'=>'Новый текст', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Тексты</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'pager' => array(
    'cssFile'=>'style.css',    
     'nextPageLabel' => 'След.',
     'prevPageLabel' => 'Пред.',
     'firstPageLabel' => 'Первая',
     'lastPageLabel' => 'Последняя',
     'header' => '',
     'maxButtonCount'=>5,
     ),
)); ?>
