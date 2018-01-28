<?php

/* @var $this yii\web\View */

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
        <div class="form-search">
            <input class="form-control" type="text" name="search" id="search-text" placeholder="Type the username you would like to search. Ex: baiano">
        </div>
        <button type="button" class="btn btn-block btn-outline-success btn-search">Search</button>
    </div>
</div>