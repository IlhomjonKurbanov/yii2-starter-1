<?php
namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleCategory;
use app\models\search\ArticleSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ArticleController extends Controller
{
	public function behaviors()
	{
		return [
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'delete' => ['post'],
						],
				],
				'access' => [
						'class' => AccessControl::className(),
						'only' => ['delete'],
						'rules' => [
								[
									'allow' => true,
									'actions' => ['delete'],
									'roles' => ['@'],
								],
						],
				],
		];
	}

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->with('author')
                ->published()
                ->orderBy([
                'created_at' => SORT_DESC
            ])
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $model = Article::find()->published()
            ->with('author')
            ->andWhere([
            'id' => $id
        ])
            ->one();
        if (! $model) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionBrowse()
    {
    	$this->layout = 'admin';
    	
    	$searchModel = new ArticleSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$dataProvider->sort = [
    			'defaultOrder'=>['published_at'=>SORT_DESC]
    	];
    	return $this->render('browse', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }
    
    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'admin';
        
        $model = new Article();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['browse']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categories' => ArticleCategory::find()->active()->all(),
                ]);
        }
    }
    
    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'admin';
        
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['browse']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories' => ArticleCategory::find()->active()->all(),
                ]);
        }
    }
    
    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['browse']);
    }
    
    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            $this->layout = 'admin';
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}