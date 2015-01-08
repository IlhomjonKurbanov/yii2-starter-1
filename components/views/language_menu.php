<?php
use yii\helpers\Html; 
use yii\helpers\Url;
?>
<ul class="nav navbar-nav navbar-right">	
	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          	<?= $currentLanguage ?> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
          <?php foreach ( $items as $key => $item ):?>
          	<li>
            	<a href="<?= Url::to($item['url']) ?>" title="<?= $item['title'] ?>"><?= $item['label'] ?></a>
            </li>
          <?php endforeach; ?>
          </ul>
        </li>
</ul>

