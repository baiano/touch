<?php

use yii\helpers\Url;
?>
<div class="row">
    <div class="col-sm-12 text-left">
            <li>
                <a href="<?= Url::to('/users/' . $model['name'] . '/repos') ?>">
                    <div class="row">
                        <div class="col-sm-5">
                            <?= $model['name'] ?>
                        </div>
                        <div class="col-sm-5">
                            <i class="glyphicon glyphicon-star"></i> Starred: <?= $model['stars'] ?> <br/>
                        </div>
                        <div class="col-sm-2">
                            <span class="btn btn-info btn-repo-detail">View details</span>
                        </div>
                    </div>
                </a>
            </li>
    </div>
</div>
