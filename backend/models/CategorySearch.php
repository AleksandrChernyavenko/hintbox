<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 15.12.2014
 * Time: 9:20
 */

namespace backend\models;

use common\traits\DateRangeTrait;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * ArticleSearch represents the model behind the search form about `backend\models\Article`.
 */
class CategorySearch extends Category
{
    use DateRangeTrait;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge([
            [['id', 'parent_id'], 'integer'],
            [['name', 'image', 'status', 'created'], 'safe'],
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
                'parent_id' => $this->parent_id,
            ]);


        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['in', 'status', $this->status]);

        $query->andFilterWhere($this->getDateRangeFilter('created'));
        $query->andFilterWhere($this->getDateRangeFilter('updated'));


        return $dataProvider;
    }
}