<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use app\components\adminMenu;
use app\components\languageMenu;

app\assets\AdminLteAsset::register($this);
app\assets\AppAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/admin-lte';

$profile = dektrium\user\models\Profile::findOne(['user_id' => \Yii::$app->getUser()->getId()]);
$avatar = isset($profile->gravatar_id)? $profile->gravatar_id : ''; 
?>

<?php $this->beginPage()?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags()?>
    <?php $this->head()?>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $directoryAsset;?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">

<?php $this->beginBody()?>

    <!-- header logo: style can be found in header.less -->
	<header class="header">
		<a href="<?= Yii::$app->homeUrl ?>" class="logo"> <!-- Add the class icon to your logo image or logo icon to add the margining -->
			<?= Yii::$app->params['siteName'] ?>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
			     <span class="sr-only"><?= Yii::t('admin', 'Toggle navigation'); ?></span> 
			     <span class="icon-bar"></span> <span class="icon-bar"></span> 
			     <span class="icon-bar"></span>
			</a>
			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<?= $this->render('widgets/msg.php', ['directoryAsset' => $directoryAsset]) ?>	
					<?= $this->render('widgets/notify.php', ['directoryAsset' => $directoryAsset])?>
					<?= $this->render('widgets/task.php', ['directoryAsset' => $directoryAsset])?>
					<!-- language dropdown -->
					<?php 
					if( Yii::$app->urlManager instanceof codemix\localeurls\UrlManager)
						echo languageMenu::widget();
					?>
					<?= $this->render('widgets/user.php', ['directoryAsset' => $directoryAsset, 'avatar'=>$avatar])?>
				</ul>
			</div>
		</nav>
	</header>
	
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<aside class="left-side sidebar-offcanvas">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
			
				<!-- Left side column. contains the logo and sidebar -->
				<!-- Sidebar user panel -->
                <div class="user-panel">
  	             <div class="pull-left info">
	               <p>
	                   <a href="<?= \yii\helpers\Url::to('@web/admin') ?>" role="button">
                            <i class="fa fa-home"></i> <?= Yii::t('admin', 'Admin dashboard') ?>
                       </a>
                  </p>  
                </div>
                <br><br> 
	           <div class="pull-left image">
		          <img src="http://gravatar.com/avatar/<?= $avatar ?>?s=160" alt="User Image" class="img-thumbnail img-responsive" />
	           </div>
	           <div class="pull-left info">
		          Hello, <?= Yii::$app->user->identity->username ?>
	           </div>
            </div>

            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
	           <div class="input-group">
		          <input type="text" name="q" class="form-control" placeholder="<?= Yii::t('admin', 'Search...'); ?>" /> 
		          <span class="input-group-btn">
			         <button type='submit' name='seach' id='search-btn' class="btn btn-flat">
				        <i class="fa fa-search"></i>
			         </button>
		          </span>
	           </div>
            </form><!-- /.search form -->
            
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<?= adminMenu::widget() ?>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">
			<!-- Main content -->
			<section class="content-header">
				<?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],])?>
			</section>
			<section class="content">
				<?= $content?>
			</section>
			<!-- /.content -->
		</aside>
		<!-- /.right-side -->
	</div>
	<!-- ./wrapper -->
	
<?php $this->endBody()?>

</body>
</html>

<?php $this->endPage()?>
