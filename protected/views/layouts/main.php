<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8">
	<title>Портфолио</title>
	<link rel="stylesheet" href="/static/css/style.css"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,700,400,300&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>

     <!-- jQuery library (served from Google) -->
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
     <!-- bxSlider Javascript file -->
     <script src="/static/js/jquery.bxslider.min.js"></script>
     <!-- bxSlider CSS file -->
     <link href="/static/css/jquery.bxslider.css" rel="stylesheet" />
 </head>
 <body>
	<div class="header">
        <div class="container">
            <!--
            <a href="#" class="logo pull-left"><img src="img/whale-icon.png" alt="" title=""/></a>
            -->
            <div class="pull-left">
                <?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Портфолио', 'url'=>array('/works'),'active'=>Yii::app()->controller->id==Yii::app()->defaultController),
						array('label'=>'Услуги', 'url'=>array('/services'),'active'=>Yii::app()->controller->id=="services"),
						array('label'=>'О нас', 'url'=>array('/about'),'active'=>Yii::app()->controller->id=="about"),
						array('label'=>'Контакты', 'url'=>array('/contacts'),'active'=>Yii::app()->controller->id=="contacts"),
						array('label'=>'Блог', 'url'=>array('/blog'),'active'=>Yii::app()->controller->id=="blog"),
						array('label'=>'Админка ('. Yii::app()->user->name .')', 'url'=>array('/admin'), 'visible'=>!Yii::app()->user->isGuest,'active'=>Yii::app()->controller->id=="admin"),
						array('label'=>'Выход','url'=>array('/admin/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
            </div>
            <div class="pull-right">
                <span class="phone">8 (913) 716-72-66</span>
                <br>
                <a class="dashed" href="#">Заказать обратный звонок</a>
            </div>
		</div>
	</div>
	<div class="content">
        <div class="container">
            <div class="content-header">
                <h2 class="pull-left">ПОРТФОЛИО</h2>
                <a class="order-button pull-right" href="#">ЗАКАЗАТЬ САЙТ</a>
            </div>
        </div>
        <div class="clearfix"></div>

        <?php echo $content;?>

	</div>
	<div class="footer">
		<div class="container">
            <div class="main">
                <p class="pull-left">
                © Web-studio “Рога и копыта” 2014<br>
                Реклама, разработка и создание сайтов, продвижение бизнеса в Интернете
                </p>
                <span class="contacts pull-right">
                    +7 (913) 716-72-66 <a class="active" href="#">Все контакты</a><br>
                    <a href="#" class="dashed">Заказать обратный звонок</a>
                </span>
            </div>
            <div class="clearfix"></div>
            <div class="brief">
                <a class="dashed" href="#">Заказать сайт</a>
                <a class="dashed" href="#">Скачать бриф</a>
            </div>
		</div>
	</div>
 </body>
</html>