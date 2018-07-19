<?php

namespace backoffice\components;

use yii\base\Widget;
use yii\helpers\ArrayHelper;

class AppComponent extends Widget {

    public function header() {

        return $this->render('appHeader', array(

        ));
    }

    public function navigation() {
        return $this->render('appNavigation', array(

        ));
    }

    public function appFooter() {
        return $this->render('appFooter', array(

        ));
    }

    public function map($config = []) {
        return $this->render('map', ArrayHelper::merge($config, array()));
    }
}
