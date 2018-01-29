<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Breadcrumbs;
?>
<div class="full-height vertical-container">
    <div class="vertical-item-center home-form">
        <div class="text-center">
            <?php
                echo Breadcrumbs::widget([
                    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                    'links' => [
                        $userName
                    ],
                ]);
            ?>
            <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_user',
                ]);
            ?>
        </div>
    </div>
</div>