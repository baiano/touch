<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<div class="full-height vertical-container">
    <div class="vertical-item-center">
        <div class="text-center">
            <div class="container repos">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well well-sm">
                            <ul class="list-unstyled list-repos">
                            <?php
                                echo GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' =>[
                                        [
                                                'attribute'=>'name',
                                                'format'=>'raw',
                                        ],
                                        [
                                            'attribute'=>'url',
                                            'format'=>'raw',
                                            'value' => function($data)
                                            {
                                                return
                                                Html::a($data['url'], [$data['url']], ['title' => 'View','class'=>'no-pjax']);
                                            }
                                        ],
                                        'description',
                                        'language',
                                        'stars'
                                    ]
                                ]);
                                // echo ListView::widget([
                                //     'dataProvider' => $dataProvider,
                                //     'columns' => [
                                //         'stars',
                                //     ],
                                //     'itemView' => '_repo',
                                // ]);
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>