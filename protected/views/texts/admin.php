<?php
/* @var $this TextsController */
/* @var $model Texts */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список текстов', 'url'=>array('index')),
	array('label'=>'Новый текст', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#texts-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление текстами</h1>

<p>
Вы можете воспользоваться операторами сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) в начале каждого поля поиска.
</p>

<p><?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?></p>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'texts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'datePublish',
		'raiting',
		'category',
		'summary',
		/*
		'note',
		'size',
		'epoch',
		'book',
		'text',
		'translate',
		'author',
		'url',
		*/
		array(
			'class'=>'CButtonColumn',
		),        
	),
    'cssFile'=>'style.css',
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
