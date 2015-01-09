<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 15.12.2014
 * Time: 9:20
 */

namespace backend\models\search;

use common\traits\DateRangeTrait;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * ArticleSearch represents the model behind the search form about `backend\models\Article`.
 */
class ArticleSearch extends Article
{
    use DateRangeTrait;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge([
            [['id', 'category_id'], 'integer'],
            [['title', 'description', 'article_decs', 'content', 'origin_url', 'status', 'default_image', 'created', 'updated'], 'safe'],
        ], self::traitRules());
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
                'id' => $this->id,
                'category_id' => $this->category_id,
            ]);


        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'article_decs', $this->article_decs])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'origin_url', $this->origin_url])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'default_image', $this->default_image]);

        $query->andFilterWhere($this->getDateRangeFilter('created'));
        $query->andFilterWhere($this->getDateRangeFilter('updated'));

        return $dataProvider;
    }
}