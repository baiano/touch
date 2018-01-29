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
                            <span>Click on column headers to reorder</span>
                            <ul class="list-unstyled list-repos">
                            <?php
                                echo GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'sorter' => $sort,
                                    'columns' =>[
                                        [
                                                'attribute'=>'name',
                                                'format'=>'raw',
                                                'value' => function($data)
                                                {
                                                    return
                                                    Html::a($data['name'], ['/repos/' . $data['fullName']], ['title' => 'View','class'=>'no-pjax']);
                                                }
                                        ],
                                        [
                                            'attribute'=>'fullName',
                                            'format'=>'raw',
                                            'value' => function($data)
                                            {
                                                return
                                                Html::a($data['name'], ['/repos/' . $data['fullName']], ['title' => 'View','class'=>'no-pjax']);
                                            }
                                        ],
                                        [
                                            'attribute'=>'name',
                                            'format'=>'raw',
                                            'value' => function($data)
                                            {
                                                return
                                                Html::a($data['htmlUrl'], ['/repos/' . $data['fullName']], ['title' => 'View','class'=>'no-pjax']);
                                            }
                                        ],
                                        [
                                            'attribute'=>'stars',
                                            'format'=>'raw',
                                            'value' => function($data)
                                            {
                                                return
                                                Html::a($data['name'], ['/repos/' . $data['fullName']], ['title' => 'View','class'=>'no-pjax']);
                                            }
                                        ],
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