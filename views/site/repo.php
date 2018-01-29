<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
?>
<div class="full-height vertical-container">
    <div class="vertical-item-center">
        <div class="text-center">
            <div class="container repos">
            <?php
                echo Breadcrumbs::widget([
                    'itemTemplate' => "<li><i>{link}</i></li>\n", 
                    'links' => [
                        [
                            'label' => $userName,
                            'url' => ['users/' . $userName],
                            'template' => "<li><b>{link}</b></li>\n",
                        ],
                        [
                            'label' => 'Repositories',
                            'url' => ['users/' . $userName . '/repos'],
                            'template' => "<li><b>{link}</b></li>\n", 
                        ],
                        $repo
                    ],
                ]);
                ?>
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
                                                return '<a href="' . $data['url'] . '" title="Open" target="_blank">' . $data['url']  . '</a>';
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