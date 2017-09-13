<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php 
    $epochlist = Epochs::model()->findAll();
    $racelist = Races::model()->findAll();
?>

<? foreach ($epochlist as $epoch): ?>
<div class="epoch">
     <a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/<?=$epoch->id; ?>"><img src="/images/<?=$epoch->picture; ?>" /></a>                
     <p class="content-text"><?=$epoch->name; ?> эпоха</p>
</div>    
<? endforeach; ?>

<? foreach ($racelist as $race): ?>
<p><a href="<?=$this->createAbsoluteUrl('/');?>/texts/race/<?=$race->id; ?>"><?=$race->name; ?></a></p>
<? endforeach; ?>
