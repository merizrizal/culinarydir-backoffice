<?php
namespace backoffice\controllers;

use Yii;
use yii\filters\VerbFilter;

/**
 * Main controller
 */
class MainController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(
            $this->getAccess(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [

                    ],
                ],
            ]);
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        $this->layout = 'zero';

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => 'error',
            ],
            'maintenance' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'zero',
            ],
        ];
    }

    public function actionIndex() {
        
        if (!Yii::$app->request->isAjax) {
            $this->layout = 'main';
        } else {
            $this->layout = 'ajax';
        }

        return $this->render('index', [
            
        ]);
    }
}