<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anamnesa */

$this->title = $model->id_anamnesis;
$this->params['breadcrumbs'][] = ['label' => 'Anamnesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id_anamnesis], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id_anamnesis], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id_anamnesis',
                            'jawaban1:ntext',
                            'jawaban2:ntext',
                            'jawaban3:ntext',
                            'jawaban4:ntext',
                            'jawaban5:ntext',
                            'jawaban6:ntext',
                            'jawaban7:ntext',
                            'nomor_rekam_medik',
                            'g',
                            'p',
                            'a',
                            'h',
                            'jawaban8:ntext',
                            'no_daftar',
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>