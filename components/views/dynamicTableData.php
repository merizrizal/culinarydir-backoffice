<?php
use kartik\grid\GridView;

$tableName = $model->tableName(); ?>

<div class="row">
    <div class="<?= $columnClass ?>">
        <div class="x_panel">
            <div class="x_title">
                <h4><?= $title ?></h4>
            </div>

            <div class="x_content">

                <div class="table table-responsive no-padding">
                    <?php

                    $column = [];

                    foreach ($tableFields as $tableField) {
                        array_push($column, $tableField);
                    }  ?>

                    <?= GridView::widget([
                        'options' => [
                            'id' => 'dataTable-' . $tableName,
                        ],
                        'dataProvider' => $dataProvider,
                        'bordered' => false,
                        'panel' => [
                            'heading' => false,
                            'footer' => false,
                            'before' => false,
                            'after' => false,
                        ],
                        'columns' => $column,
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>