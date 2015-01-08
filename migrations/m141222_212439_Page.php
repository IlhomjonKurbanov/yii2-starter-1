<?php

use yii\db\Schema;
use yii\db\Migration;

class m141222_212439_Page extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    	}
    	$this->createTable('{{%page}}', [
    			'id' => Schema::TYPE_PK,
    			'alias' => Schema::TYPE_STRING . '(1024) NOT NULL',
    	        'lang'  => Schema::TYPE_STRING . '(5) NOT NULL',
    			'title' => Schema::TYPE_STRING . '(512) NOT NULL',
    			'body' => Schema::TYPE_TEXT . ' NOT NULL',
    			'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
    			'created_at' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    	], $tableOptions);
    	
    	$this->insert('{{%page}}', [
    			'alias'=>'about',
    	        'lang' => 'en',
    			'title'=>'About',
    			'body'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    			'status'=>\app\models\Page::STATUS_PUBLISHED,
    			'created_at'=>time(),
    			'updated_at'=>time(),
    	]);
    	$this->insert('{{%page}}', [
    			'alias'=>'about',
    			'lang' => 'uk',
    			'title'=>'Про нас',
    			'body'=>'Сторінка опису компанії.',
    			'status'=>\app\models\Page::STATUS_PUBLISHED,
    			'created_at'=>time(),
    			'updated_at'=>time(),
    	]);
    	$this->insert('{{%page}}', [
    			'alias'=>'about',
    			'lang' => 'ru',
    			'title'=>'O нас',
    			'body'=>'Страница описания компании.',
    			'status'=>\app\models\Page::STATUS_PUBLISHED,
    			'created_at'=>time(),
    			'updated_at'=>time(),
    	]);
    }

    public function down()
    {
        $this->dropTable('{{%page}}');
    }
}
