<?php
namespace backoffice\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class BaseController extends Controller
{
    protected $ajaxLayout = '@backoffice/views/layouts/ajax';

    public function beforeAction($action) {

        $this->getView()->params['assetCommon'] = \common\assets\AppAsset::register($this->getView());

        if (empty(\Yii::$app->session->get('user_app_module'))) {

            $userAppModule = \core\models\UserAppModule::find()
                            ->andWhere(['sub_program' => \Yii::$app->params['subprogramLocal']])
                            ->asArray()->all();

            \Yii::$app->session->set('user_app_module', $userAppModule);
        }

        return parent::beforeAction($action);
    }

    public function getAccess() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {

                            $userData = \Yii::$app->session->get('user_data');

                            if (!empty($userData['user_level']) && !empty($userData['user_akses'])) {

                                foreach ($userData['user_level'] as $dataLevel) {

                                    if ($dataLevel['is_super_admin']) {

                                        return true;
                                    }
                                }

                                foreach ($userData['user_akses'] as $dataAkses) {

                                    $module = '';

                                    if (!empty($action->controller->module->id)) {

                                        $module = $action->controller->module->id . '/';
                                    }

                                    if (
                                            $dataAkses['userAppModule']['nama_module'] === $module . $action->controller->id
                                            && $dataAkses['userAppModule']['module_action'] === $action->id
                                            && $dataAkses['userAppModule']['sub_program'] === \Yii::$app->params['subprogramLocal']
                                            && $dataAkses['is_active']
                                    ) {

                                        return true;
                                    }
                                }
                            }

                            if ($action->controller->id === 'site') {

                                return true;
                            }

                            return false;
                        }
                    ],
                    [
                        'allow' => true,
                        'roles' => ['?'],
                        'matchCallback' => function ($rule, $action) {

                            if ($action->controller->id === 'site') {

                                return true;
                            } else {

                                $userAppModule = \Yii::$app->session->get('user_app_module');

                                foreach ($userAppModule as $value) {

                                    $module = '';

                                    if (!empty($action->controller->module->id)){

                                        $module = $action->controller->module->id . '/';
                                    }

                                    if (
                                            $value['nama_module'] === $module . $action->controller->id
                                            && $value['module_action'] === $action->id
                                            && $value['sub_program'] === \Yii::$app->params['subprogramLocal']
                                            && $value['guest_can_access']
                                    ) {

                                        return true;
                                    }
                                }

                                return false;
                            }
                        }
                    ],
                ],
            ]
        ];

        return [];
    }

    public function render($view, $params = array()) {

        if (\Yii::$app->request->isAjax) {

            $this->layout = $this->ajaxLayout;
        }

        return parent::render($view, $params);
    }
}