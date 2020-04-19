<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use yii\data\Sort;

class CountryController extends Controller {

    public function actionIndex() {
        $query = Country::find();

        $sort = new Sort(
            [
                'attributes' => [
                    'name' => [
                        'asc' => ['name' => SORT_ASC],
                        'desc' => ['name' => SORT_DESC],
                        'label' => 'Country',
                        'default' => SORT_ASC,
                    ],
                    'population',
                ]
            ]
        );

        $sort->defaultOrder = ['name' => SORT_ASC, 'population' => SORT_ASC]; 

        $pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy($sort->orders)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
            return $this->render('index', [
                'countries' => $countries,
                'pagination' => $pagination,
                'sort' => $sort,
            ]);
    }

}

?>