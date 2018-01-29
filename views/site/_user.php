<?php

use yii\helpers\Url;
?>
<div class="container user">
    <div class="row">
        <div class="col-xs-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?= $model['avatar'] ?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8 text-left">
                        <h4>
                            <?= $model['username'] ?>
                        </h4>
                        <p>
                            <i class="glyphicon glyphicon-user"></i> Bio: <?= $model['bio'] ?>
                            <br />
                            <i class="glyphicon glyphicon-envelope"></i> Email: <?= $model['email'] ?>
                            <br />
                            <i class="glyphicon glyphicon-star"></i> Following: <?= $model['following'] ?>
                            <br />
                            <i class="glyphicon glyphicon-share-alt"></i> Followers: <?= $model['followers'] ?>
                        </p>
                        <a href="<?= Url::to('/users/' . $model['username'] . '/repos') ?>">
                            <span class="btn btn-info">View repositories</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
