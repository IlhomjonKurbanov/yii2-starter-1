<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\data\SqlDataProvider;
use app\models\forms\UploadForm;
use app\helpers\dbHelper;

class AdminController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
					'rules' => [
						[
							'allow' => true,
							'roles' => ['@'],
						],
					],
				],
		];
	}
	
	public function init()
	{
		$this->layout = 'admin';
	}
	
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionDb($msg = '')
    {
    	return $this->render('db', ['msg' => $msg]);
    }
    
    public function actionBackup()
    {
    	$msg = \Yii::t('admin','Backup file create failure.');
    	try {
    		$zipname = dbHelper::db_backup();
    		if($zipname)
    		{
    			$msg = \Yii::t('admin','Backup file is stored in ') . $zipname;
    			return \Yii::$app->response->sendFile($zipname);
    		}
    	}
    	catch (Exception $e) {
    		$this->redirect(['db', 'msg'=>$msg]);
    	}
    	return $this->redirect(['db', 'msg'=>$msg]);
    }
    public function actionRestore()
    {
    	$msg = \Yii::t('admin','Database restore error');
    	$model = new UploadForm();
    	if (\Yii::$app->request->isPost)
    	{
    		try
    		{
    			$model->file = UploadedFile::getInstance($model, 'file');
    			if ($model->validate())
    			{
    				$filename = \Yii::$app->basePath . '/runtime/' . $model->file->name;
    				if ( $model->file->saveAs($filename) )
    				{
    					if ( dbHelper::db_restore($filename, (strtolower($model->file->extension) == 'zip')) )
    					{
    						$msg = \Yii::t('admin','Database restored from ') . $model->file->name;
    					}
    					unlink($filename);
    				}
    				$this->redirect(['db', 'msg'=>$msg]);
    			}
    		}
    		catch (Exception $e)
    		{
    			$this->redirect(['db', 'msg'=>$msg]);
    		}
    	}
    	return $this->render('restore', ['model' => $model]);
    }
}
