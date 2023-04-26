<div class="admin-default-index">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Контент</h3>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Последние зарегистрировавшиеся пользователи
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    foreach ($lastUsers as $user): ?>
                        <div class="media">
                            <a href="<?= yii\helpers\Url::to(['user/view', 'id' => $user->id]) ?>" target="_blank">
                                <div class="media-left">
                                    <img class="media-object" style="width: 50px;" src="<?= $user->image ?>"
                                         alt="<?= $user->login ?>">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <?= $user->login ?>
                                    </h4>
                                    <?= $user->fio ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
