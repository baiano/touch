<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = 'My Yii Application';
?>
<div class="full-height vertical-container">
    <div class="vertical-item-center home-form">
        <div class="text-center">
            <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_user',
                ]);
            ?>
        </div>
    </div>
</div>