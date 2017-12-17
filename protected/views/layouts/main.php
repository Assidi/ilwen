<?php /* @var $this Controller */ 
    $epochlist = Epochs::model()->findAll();
    $racelist = Races::model()->findAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="ru">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">	
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/bootstrap/bootstrap.min.css">	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid.css">
    
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/textarea.css">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
    <header> 
        <div class="head">
            <div class="site-head">
                <?php echo CHtml::encode(Yii::app()->name); ?>
            </div>
            
        </div> 
        <!-- главное меню -->
            <nav class="navbar navbar-my">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>                  
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="<?=$this->createAbsoluteUrl('/');?>/site/index">Главная<span class="sr-only">(current)</span></a></li>                    
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Эпохи<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <? foreach ($epochlist as $epoch): ?>
                        <li><a href="<?=$this->createAbsoluteUrl('/');?>/texts/epoch/<?=$epoch->id; ?>"><?=$epoch->name; ?></a></li>                        
                        <? endforeach; ?>
                      </ul>                      
                    </li>                    
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Народы<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <? foreach ($racelist as $race): ?>
                        <li><a href="<?=$this->createAbsoluteUrl('/');?>/texts/race/<?=$race->id; ?>"><?=$race->name; ?></a></li>                        
                        <? endforeach; ?>                        
                      </ul>
                    </li>
                    <li><a href="<?=$this->createAbsoluteUrl('/');?>/texts/search">Найти тексты</a></li>
                    <li><a href="<?=$this->createAbsoluteUrl('/');?>/article">Статьи</a></li>
                    <li><a href="#">Иллюстрации</a></li>
                    <? if(!Yii::app()->user->isGuest): ?>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Админка<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?=$this->createAbsoluteUrl('/');?>/texts/index">Тексты</a></li>
                        <li><a href="<?=$this->createAbsoluteUrl('/');?>/characters/index">Персонажи</a></li>
                        <li><a href="<?=$this->createAbsoluteUrl('/');?>/genres/index">Жанры</a></li>
                        <li><a href="<?=$this->createAbsoluteUrl('/');?>/epochs/index">Эпохи</a></li>
                        <li><a href="<?=$this->createAbsoluteUrl('/');?>/races/index">Народы</a></li>
                        <li><a href="<?=$this->createAbsoluteUrl('/');?>/books/index">Книги</a></li>                       
                      </ul>
                    </li>
                    <li><a href="<?=$this->createAbsoluteUrl('/');?>/site/logout">Выход (admin)</a></li>
                    <? endif; ?> 
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>        
        
    </header>
    <div class="main-content">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    
	<?php echo $content; ?>
    
    </div>
    <!--
<?php if(Yii::app()->params['debug']):?>
        <pre><?php print_r(Yii::app()->params['debug']);?></pre>
    <?php endif; ?> 
--> 
	<footer>
		&copy; <?php echo date('Y'); ?> Юлия Понедельник<br/>
		Все права зарезервированы.<br/>
		<?php echo Yii::powered(); ?><br />
        Разработка <a href="http://assidi.ru" target="_blank">Ассиди</a>
	</footer>

</div><!-- page -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery/jquery-3.2.0.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/js/scripts.js"></script>
</body>
</html>
