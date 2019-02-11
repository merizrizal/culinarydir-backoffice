<?php
namespace backoffice\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Response;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends BaseController
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
                        'logout' => ['POST'],
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

    public function actionLogin() {

        $this->layout = 'zero';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $post = Yii::$app->request->post();
        $model = new LoginForm();

        if (!empty($post['loginButton']) && $model->load($post) && $model->login()) {

            return $this->redirect(['site/default']);
        } else {

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout() {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionDefault() {

        if (!Yii::$app->request->isAjax) {
            
            return $this->redirect(['main/index']);
        } else {
            
            return $this->run('main/index');
        }
    }

    public function actionGetDatetime() {

        Yii::$app->formatter->timeZone = 'Asia/Jakarta';
        $datetime = [];
        $datetime['date'] = Yii::$app->formatter->asDatetime(time(), 'EEEE, d LLLL yyyy');
        $datetime['time'] = Yii::$app->formatter->asDatetime(time(), 'HH:mm');

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $datetime;
    }
}
