<?php
return [
    'maskMoneyOptions' => [
        'prefix' => 'Rp ',
        'suffix' => '',
        'affixesStay' => true,
        'thousands' => '.',
        'decimal' => ',',
        'precision' => 0,
        'allowZero' => false,
        'allowNegative' => false,
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
    'checkbox-radio-script' => function() {
        $jscript = '$(\'input[type="radio"], input[type="checkbox"]\').iCheck({
                    checkboxClass: "icheckbox_minimal-blue",
                    radioClass: "iradio_minimal-blue"
                });';

        return $jscript;
    },
    'pageSize' => 25,
    'subprogramLocal' => 'backoffice',
];