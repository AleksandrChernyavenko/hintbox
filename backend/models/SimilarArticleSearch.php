<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 15.12.2014
 * Time: 9:20
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SimilarArticleSearch represents the model behind the search form about `backend\models\SimilarArticle`.
 */
class SimilarArticleSearch extends SimilarArticle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from_id', 'to_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
                'from_id' => $this->from_id,
                'to_id' => $this->to_id,
            ]);


        return $dataProvider;
    }
}