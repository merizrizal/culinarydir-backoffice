<?php
return [
    'maskedInputOptions' => [
        'prefix' => 'Rp ',
        'allowMinus' => false,
    ],
    'datepickerOptions' => [
        'format' => 'yyyy-mm-dd',
        'autoclose' => true,
        'todayHighlight' => true,
        'minView' => 2,
    ],
    'datetimepickerOptions' => [
        'format' => 'yyyy-mm-dd hh:ii:ss',
        'autoclose' => true,
        'todayHighlight' => true,
    ],
    'errMysql' => [
        '7' => '<br>Data ini terkait dengan data yang terdapat pada modul yang lain.',
    ],
    'checkbox-radio-script' => function($type = null, $color = null, $element = 'input[type=\"radio\"], input[type=\"checkbox\"]') {
        $jscript = '$("' . $element . '").iCheck({
                    checkboxClass: "icheckbox_' . (!empty($type) ? $type : 'square') . '-' . (!empty($color) ? $color : 'blue') . '",
                    radioClass: "iradio_' . (!empty($type) ? $type : 'square') . '-' . (!empty($color) ? $color : 'blue') . '"
                });';

        return $jscript;
    },
    'pageSize' => 25,
    'subprogramLocal' => 'backoffice',
];