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
 * PredicationSearch represents the model behind the search form about `backend\models\Predication`.
 */
class PredicationSearch extends Prediction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['text'],  'string', 'length' => [4, 255]],
        ];
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
            ]);


        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}