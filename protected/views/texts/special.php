<?php
Yii::app()->params['debug'] = $genres;
$this->renderPartial('_search_custom',array(
    'model'=>$model,  
    'character'=>$character,
    'characters'=>$characters,
    'genre'=>$genre,
    'genres'=>$genres,  
    'maxSize'=>$maxSize,
    'minSize'=>$minSize,
));

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->customSearch(),
	'itemView'=>'_view',
    'pager' => array(
    'cssFile'=>'main.css',    
     'nextPageLabel' => 'След.',
     'prevPageLabel' => 'Пред.',
     'firstPageLabel' => 'Первая',
     'lastPageLabel' => 'Последняя',
     'header' => 'Страница: ',
     'maxButtonCount'=>5,
     ),
	
));
?>