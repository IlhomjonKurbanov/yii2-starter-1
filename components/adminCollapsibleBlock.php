<?php
namespace app\components;

use Yii;
use yii\base\Widget;

class adminCollapsibleBlock extends Widget
{
    public $color = 'blue';
    public $btn_type = 'primary';
    public $icon = 'fa-cog';
    public $title = '';
    public $body = '';
    public $footer ='';
    
    public function init()
    { ?>
        <div class="col-md-4">
        <div class="box box-solid bg-<?= $this->color ?>-gradient">
        <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button
            class="btn btn-<?= $this->btn_type ?> btn-sm pull-right"
            data-widget='collapse'
					data-toggle="tooltip"
					title="<?= Yii::t('admin', 'Collapse') ?>"
					style="margin-right: 5px;">
					<i class="fa fa-minus"></i>
        					    </button>
        					    </div><!-- /. tools -->
        					    <i class="fa <?= $this->icon ?>"></i>
        					    <h3 class="box-title"><?= $this->title ?></h3>
        		</div>
        		<div class="box-body ">
    <?php }

    public function run()
    {
        if( isset($content) )
            echo $content;
        elseif( isset($this->body) )
            echo $this->body; 
        ?>
        		</div><!-- /.box-body-->
        		<div class="box-footer no-border">
        		  <?php if(isset($this->footer)) echo $this->footer; ?>
        		</div>
        	</div>
         </div>

    <?php }
}
?>