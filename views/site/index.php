<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="full-height vertical-container">
    <div class="vertical-item-center home-form">
        <div class="text-center">
            <h1>Search from GitHub</h1>
            <span>
                A simple tool to navigate on the GitHub User's database.
            </span>
        </div>
        <form method="post" action="<?= Url::to('/users') ?>">
            <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
            <div class="form-search">
                <input class="form-control" type="text" name="search" id="search-text" placeholder="Type the username you would like to search. Ex: baiano">
            </div>
            <button type="submit" class="btn btn-block btn-search">Search</button>
        </form>
    </div>
</div>