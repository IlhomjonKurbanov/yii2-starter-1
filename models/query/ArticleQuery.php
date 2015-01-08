<?php
namespace app\models\query;

use app\models\Article;
use yii\db\ActiveQuery;

class ArticleQuery extends ActiveQuery {
    public function published()
    {
        $this->andWhere(['status' => Article::STATUS_PUBLISHED]);
        $this->andWhere(['<', 'article.published_at', time()]);
        return $this;
    }
}