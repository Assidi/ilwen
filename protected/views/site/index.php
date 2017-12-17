<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Добро пожаловать на мой сайт!</h1>
<p>Здесь собраны все мои тексты и статьи по миру Толкина.</p>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/1">
        <img class="image-main" src="<?php echo Yii::app()->request->baseUrl; ?>/images/epoch0.jpg" />
        </a>
        <p class="a-main"><a  href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/1">Предначальная эпоха</a></p>
    </div>
    <div class="col-md-3 col-sm-6">
        <a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/2">
        <img class="image-main" src="<?php echo Yii::app()->request->baseUrl; ?>/images/epoch1.jpg" />
        </a>
        <p class="a-main"><a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/2">Первая эпоха</a></p>
    </div>
    <div class="col-md-3 col-sm-6">
        <a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/3">
        <img class="image-main" src="<?php echo Yii::app()->request->baseUrl; ?>/images/epoch2.jpg" />
        </a>
        <p class="a-main"><a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/3">Вторая эпоха</a></p>
    </div>
    <div class="col-md-3 col-sm-6">
        <a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/4">
        <img class="image-main" src="<?php echo Yii::app()->request->baseUrl; ?>/images/epoch3.jpg" />
        </a>
        <p class="a-main"><a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/4">Третья эпоха</a></p>
    </div>
</div>







