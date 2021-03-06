<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-11-28 15:15:47
 */

use app\components\Helper;
use app\models\DataLayanan;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTht */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan THT Tenaga Kerja';
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
    #form-spesialis-tht .col-form-label {
        font-size: smaller;
    }

    #form-spesialis-tht .form-group {
        margin-bottom: 0.2rem;
    }

    .form-group {
        margin-bottom: 0px !important;
    }

    .tabel-tht label {
        margin-bottom: 0px !important;
    }

    .tr-ac-bc td {
        padding: 3px !important;
    }

    .tr-ac-bc .was-validated .form-control:valid,
    .tr-ac-bc .form-control.is-valid {
        padding: 0.75rem !important;
        background-image: none;
    }
</style>

<?php $form = ActiveForm::begin([
    'id' => 'form-spesialis-tht',
    'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
]); ?>
<div class="row">
    <div class="col-md-12">
        <?= $this->render(
            'timeline',
            [
                'paket' => $paket,
                'id' => $id,
                'no_register' => $no_register,
            ]
        ) ?>
        <hr>
    </div>
</div>
<div class="card card-body">

    <div class="mcu-spesialis-audiometri-form">

        <div style="text-align: center;">
            <h3 style="font-weight: bold; margin-bottom: 0px;">Unit Medical Check Up</h3>
            <h3 style="font-weight: bold; margin-top: 0px;"><?= Html::encode($this->title) ?></h3>
        </div>

        <br>
        <div class="form-group" style="margin-top: 5px; display: none;">
            <?php
            echo Html::submitButton('Simpan', ['class' => 'btn btn-success', 'id' => 'btn-form-cari']);
            ?>
        </div>


        <?= $form->field($model, 'cari_pasien')->hiddenInput()->label(false) ?>

        <div class="row">
            <div class="col-sm-3">
                <label for="">No. Rekam Medik</label>
                <?php
                $model->no_rekam_medik = $id;
                echo $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true, 'readonly' => true, 'class' => 'form-control form-control-sm'])->label(false)
                ?>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input readonly type="text" class="form-control form-control-sm" value="<?= $pasien->nama ?? null ?>" id="nama_pasien">
                </div>
            </div>
            <div class="col-sm-3">
                <label for="">No. Daftar</label>
                <?php
                $model->no_daftar = $no_register;
                echo $form->field($model, 'no_daftar')->textInput(['maxlength' => true, 'readonly' => true, 'class' => 'form-control form-control-sm'])->label(false)
                ?>
            </div>
        </div>

        <br>

        <table class="table table-sm tabel-tht">
            <colgroup width="35"></colgroup>
            <colgroup width="207"></colgroup>
            <colgroup width="29"></colgroup>
            <colgroup span="4" width="160"></colgroup>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="19" align="left" valign=top><b>
                        <font color="#000000">I. TELINGA</font>
                    </b></td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="19" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>
                        <font color="#000000">TELINGA KANAN</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>
                        <font color="#000000">TELINGA KIRI</font>
                    </b></td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=top sdval="1" sdnum="1033;">
                    <font color="#000000">1</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Daun Telinga</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_daun_telinga_kanan',  ['id' => 'mcuspesialistht_tl_daun_telinga_kanan_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_daun_telinga_kanan == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_daun_telinga_kanan_1" name="McuSpesialisTht[tl_daun_telinga_kanan]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_daun_telinga_kiri',  ['id' => 'mcuspesialistht_tl_daun_telinga_kiri_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_daun_telinga_kiri == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_daun_telinga_kiri_1" name="McuSpesialisTht[tl_daun_telinga_kiri]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=top sdval="2" sdnum="1033;">
                    <font color="#000000">2</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Liang Telinga</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_liang_telinga_kanan',  ['id' => 'mcuspesialistht_tl_liang_telinga_kanan_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_liang_telinga_kanan == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_liang_telinga_kanan_1" name="McuSpesialisTht[tl_liang_telinga_kanan]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_liang_telinga_kiri',  ['id' => 'mcuspesialistht_tl_liang_telinga_kiri_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_liang_telinga_kiri == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_liang_telinga_kiri_1" name="McuSpesialisTht[tl_liang_telinga_kiri]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="38" align="center" valign=top sdval="3" sdnum="1033;">
                    <font color="#000000">3</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="left" valign=top>
                    <font color="#000000">Serumen</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_serumen_telinga_kanan',  ['id' => 'mcuspesialistht_tl_serumen_telinga_kanan_0', 'value' => 'Tidak Ada', 'label' => 'Tidak Ada']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_serumen_telinga_kanan == 'Ada Serumen') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_serumen_telinga_kanan_1" name="McuSpesialisTht[tl_serumen_telinga_kanan]" value="Ada Serumen">
                        Ada Serumen
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_serumen_telinga_kiri',  ['id' => 'mcuspesialistht_tl_serumen_telinga_kiri_0', 'value' => 'Tidak Ada', 'label' => 'Tidak Ada']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_serumen_telinga_kiri == 'Ada Serumen') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_serumen_telinga_kiri_1" name="McuSpesialisTht[tl_serumen_telinga_kiri]" value="Ada Serumen">
                        Ada Serumen
                    </label>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_serumen_telinga_kanan == 'Menyumbat (Prop)') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_serumen_telinga_kanan_2" name="McuSpesialisTht[tl_serumen_telinga_kanan]" value="Menyumbat (Prop)">
                        Menyumbat (Prop)
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_serumen_telinga_kiri == 'Menyumbat (Prop)') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_serumen_telinga_kiri_2" name="McuSpesialisTht[tl_serumen_telinga_kiri]" value="Menyumbat (Prop)">
                        Menyumbat (Prop)
                    </label>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="38" align="center" valign=top sdval="4" sdnum="1033;">
                    <font color="#000000">4</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="left" valign=top>
                    <font color="#000000">Membrana Timpani</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_membrana_timpani_telinga_kanan',  ['id' => 'mcuspesialistht_tl_membrana_timpani_telinga_kanan_0', 'value' => 'Intak', 'label' => 'Intak']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_membrana_timpani_telinga_kanan == 'Tidak Intak') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_membrana_timpani_telinga_kanan_1" name="McuSpesialisTht[tl_membrana_timpani_telinga_kanan]" value="Tidak Intak">
                        Tidak Intak
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_membrana_timpani_telinga_kiri',  ['id' => 'mcuspesialistht_tl_membrana_timpani_telinga_kiri_0', 'value' => 'Intak', 'label' => 'Intak']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_membrana_timpani_telinga_kiri == 'Tidak Intak') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_membrana_timpani_telinga_kiri_1" name="McuSpesialisTht[tl_membrana_timpani_telinga_kiri]" value="Tidak Intak">
                        Tidak Intak
                    </label>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_membrana_timpani_telinga_kanan == 'Lainnya') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_membrana_timpani_telinga_kanan_2" name="McuSpesialisTht[tl_membrana_timpani_telinga_kanan]" value="Lainnya">
                        Lainnya
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_membrana_timpani_telinga_kiri == 'Lainnya') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_membrana_timpani_telinga_kiri_2" name="McuSpesialisTht[tl_membrana_timpani_telinga_kiri]" value="Lainnya">
                        Lainnya
                    </label>
                </td>
            </tr>
            <tr>
                <td class="tr_test_garpu_tala_td_no" rowspan="<?= $model->tl_test_garpu_tala_periksa == 'Tidak' ? '1' : '6' ?>" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=top sdval="5" sdnum="1033;">
                    <font color="#000000">5</font>
                </td>
                <td colspan="6" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <div class="row" style="padding-left: 10px;">

                        <font color="#000000" style="font-weight: bold;">Tes Garpu Tala</font>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?= $form->field($model, 'tl_test_garpu_tala_periksa')->inline()->radioList(['Ya' => 'Dilakukan Pemeriksaan', 'Tidak' => 'Tidak Melakukan Pemeriksaan',], [
                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                            },
                        ])->label(false) ?>
                    </div>
                </td>
            </tr>
            <tr class="tr_test_garpu_tala" style="<?= $model->tl_test_garpu_tala_periksa == 'Tidak' ? 'display: none' : null ?>">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Rinne</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_test_garpu_tala_rinne_telinga_kanan',  ['id' => 'mcuspesialistht_tl_test_garpu_tala_rinne_telinga_kanan_0', 'value' => 'Negatif (AC < BC)', 'label' => 'Negatif (AC < BC)']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_test_garpu_tala_rinne_telinga_kanan == 'Positif (AC > BC)') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_test_garpu_tala_rinne_telinga_kanan_1" name="McuSpesialisTht[tl_test_garpu_tala_rinne_telinga_kanan]" value="Positif (AC > BC)">
                        Positif (AC > BC)
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_test_garpu_tala_rinne_telinga_kiri',  ['id' => 'mcuspesialistht_tl_test_garpu_tala_rinne_telinga_kiri_0', 'value' => 'Negatif (AC < BC)', 'label' => 'Negatif (AC < BC)']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_test_garpu_tala_rinne_telinga_kiri == 'Positif (AC > BC)') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_test_garpu_tala_rinne_telinga_kiri_1" name="McuSpesialisTht[tl_test_garpu_tala_rinne_telinga_kiri]" value="Positif (AC > BC)">
                        Positif (AC > BC)
                    </label>
                </td>
            </tr>
            <tr class="tr_test_garpu_tala" style="<?= $model->tl_test_garpu_tala_periksa == 'Tidak' ? 'display: none' : null ?>">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Weber</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_weber_telinga_kanan',  ['id' => 'mcuspesialistht_tl_weber_telinga_kanan_0', 'value' => 'Tidak Ada Lateralisasi', 'label' => 'Tidak Ada Lateralisasi']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_weber_telinga_kanan == 'Lateralisasi Kanan') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_weber_telinga_kanan_1" name="McuSpesialisTht[tl_weber_telinga_kanan]" value="Lateralisasi Kanan">
                        Lateralisasi Kanan
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_weber_telinga_kiri',  ['id' => 'mcuspesialistht_tl_weber_telinga_kiri_0', 'value' => 'Tidak Ada Lateralisasi', 'label' => 'Tidak Ada Lateralisasi']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_weber_telinga_kiri == 'Lateralisasi Kiri') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_weber_telinga_kiri_1" name="McuSpesialisTht[tl_weber_telinga_kiri]" value="Lateralisasi Kiri">
                        Lateralisasi Kiri
                    </label>
                </td>
            </tr>
            <tr class="tr_test_garpu_tala" style="<?= $model->tl_test_garpu_tala_periksa == 'Tidak' ? 'display: none' : null ?>">
                <td rowspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Swabach</font>
                </td>
                <td rowspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_swabach_telinga_kanan',  ['id' => 'mcuspesialistht_tl_swabach_telinga_kanan_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_swabach_telinga_kanan == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kanan_1" name="McuSpesialisTht[tl_swabach_telinga_kanan]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_swabach_telinga_kiri',  ['id' => 'mcuspesialistht_tl_swabach_telinga_kiri_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_swabach_telinga_kiri == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kiri_1" name="McuSpesialisTht[tl_swabach_telinga_kiri]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
            </tr>
            <tr class="tr_test_garpu_tala" style="<?= $model->tl_test_garpu_tala_periksa == 'Tidak' ? 'display: none' : null ?>">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_swabach_telinga_kanan == 'Memendek') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kanan_2" name="McuSpesialisTht[tl_swabach_telinga_kanan]" value="Memendek">
                        Memendek
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_swabach_telinga_kanan == 'Memanjang') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kanan_3" name="McuSpesialisTht[tl_swabach_telinga_kanan]" value="Memanjang">
                        Memanjang
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_swabach_telinga_kiri == 'Memendek') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kiri" name="McuSpesialisTht[tl_swabach_telinga_kiri]" value="Memendek">
                        Memendek
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_swabach_telinga_kiri == 'Memanjang') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kiri" name="McuSpesialisTht[tl_swabach_telinga_kiri]" value="Memanjang">
                        Memanjang
                    </label>
                </td>
            </tr>
            <tr class="tr_test_garpu_tala" style="<?= $model->tl_test_garpu_tala_periksa == 'Tidak' ? 'display: none' : null ?>">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Bing</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_bing_telinga_kanan',  ['id' => 'mcuspesialistht_tl_bing_telinga_kanan_0', 'value' => 'Bertambah Keras', 'label' => 'Bertambah Keras']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_bing_telinga_kanan == 'Tidak Bertambah Keras') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_bing_telinga_kanan_1" name="McuSpesialisTht[tl_bing_telinga_kanan]" value="Tidak Bertambah Keras">
                        Tidak Bertambah Keras
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tl_bing_telinga_kiri',  ['id' => 'mcuspesialistht_tl_bing_telinga_kiri_0', 'value' => 'Bertambah Keras', 'label' => 'Bertambah Keras']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tl_bing_telinga_kiri == 'Tidak Bertambah Keras') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_bing_telinga_kiri_1" name="McuSpesialisTht[tl_bing_telinga_kiri]" value="Tidak Bertambah Keras">
                        Tidak Bertambah Keras
                    </label>
                </td>
            </tr>
            <tr>
                <td rowspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=top sdval="5" sdnum="1033;">
                    <font color="#000000">6</font>
                </td>
                <td colspan="6" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <div class="row" style="padding-left: 10px;">

                        <font color="#000000" style="font-weight: bold;">Tes Berbisik</font>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?= $form->field($model, 'tl_test_berbisik_periksa')->inline()->radioList(['Ya' => 'Dilakukan Pemeriksaan', 'Tidak' => 'Tidak Melakukan Pemeriksaan',], [
                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                            },
                        ])->label(false) ?>
                    </div>
                </td>
            </tr>
            <tr style="<?= $model->tl_test_berbisik_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_test_berbisik">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Tes Berbisik</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?php
                    $optionBerbisik = [
                        'Jarak &ge; 1 Meter' => 'Jarak &ge; 1 Meter',
                        'Jarak 3-2 Meter' => 'Jarak 3-2 Meter',
                        'Jarak 4 Meter' => 'Jarak 4 Meter',
                        'Jarak 6-5 Meter' => 'Jarak 6-5 Meter',
                    ];
                    ?>

                    <?php
                    echo $form->field($model, 'tl_test_berbisik_telinga_kanan_option')->widget(Select2::classname(), [
                        'data' => $optionBerbisik,
                        'theme' => 'bootstrap',
                        'pluginOptions' => [
                            'allowClear' => false,
                            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        ],
                        'pluginEvents' => [
                            "select2:select" => "function(e) { 
                            let dipilih = e.params.data.id
                            let optionBerbisik = {
                                'Jarak &ge; 1 Meter' : 'Tuli Berat',
                                'Jarak 3-2 Meter' : 'Tuli Ringan',
                                'Jarak 4 Meter' : 'Tuli Sedang',
                                'Jarak 6-5 Meter' : 'Dalam Batas Normal',
                            }
                            $('#mcuspesialistht-tl_test_berbisik_telinga_kanan').val(optionBerbisik[dipilih]).trigger('change')
                        }",
                        ],
                    ])->label(false);
                    echo $form->field($model, 'tl_test_berbisik_telinga_kanan')->textInput(['maxlength' => true, 'readonly' => true, 'style' => 'margin-top: 5px;'])->label(false)
                    ?>
                </td>
                <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?php
                    echo $form->field($model, 'tl_test_berbisik_telinga_kiri_option')->widget(Select2::classname(), [
                        'data' => $optionBerbisik,
                        'theme' => 'bootstrap',
                        'pluginOptions' => [
                            'allowClear' => false,
                            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        ],
                        'pluginEvents' => [
                            "select2:select" => "function(e) { 
                            let dipilih = e.params.data.id
                            let optionBerbisik = {
                                'Jarak &ge; 1 Meter' : 'Tuli Berat',
                                'Jarak 3-2 Meter' : 'Tuli Ringan',
                                'Jarak 4 Meter' : 'Tuli Sedang',
                                'Jarak 6-5 Meter' : 'Dalam Batas Normal',
                            }
                            $('#mcuspesialistht-tl_test_berbisik_telinga_kiri').val(optionBerbisik[dipilih]).trigger('change')
                        }",
                        ],
                    ])->label(false);
                    echo $form->field($model, 'tl_test_berbisik_telinga_kiri')->textInput(['maxlength' => true, 'readonly' => true, 'style' => 'margin-top: 5px;'])->label(false)
                    ?>
                </td>
                <!-- <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_test_berbisik_telinga_kanan_6 == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_test_berbisik_telinga_kanan_1" name="McuSpesialisTht[tl_test_berbisik_telinga_kanan_6]" value="Tidak Normal">
                    Tidak Normal
                </label>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_test_berbisik_telinga_kiri_6',  ['id' => 'mcuspesialistht_tl_test_berbisik_telinga_kiri_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_test_berbisik_telinga_kiri_6 == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_test_berbisik_telinga_kiri_1" name="McuSpesialisTht[tl_test_berbisik_telinga_kiri_6]" value="Tidak Normal">
                    Tidak Normal
                </label>
            </td> -->
            </tr>

        </table>

        <table class="table">
            <colgroup span="19" width="53"></colgroup>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=20 height="19" valign=top>
                    <div class="row">

                        <b>
                            <font color="#000000">7. Audiometri</font>
                        </b>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?= $form->field($model, 'tl_audiometri_periksa')->inline()->radioList(['Ya' => 'Dilakukan Pemeriksaan', 'Tidak' => 'Tidak Melakukan Pemeriksaan',], [
                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                            },
                        ])->label(false) ?>
                    </div>
                </td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="19" align="center" valign=top><b>
                        <font color="#000000">Right/Kanan</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=9 align="center" valign=top><b>
                        <font color="#000000">Left/Kiri</font>
                    </b></td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="center" valign=middle><b>
                        <font color="#000000"><br></font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="125" sdnum="1033;"><b>
                        <font color="#000000">125</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="250" sdnum="1033;"><b>
                        <font color="#000000">250</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="500" sdnum="1033;"><b>
                        <font color="#000000">500</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="1000" sdnum="1033;"><b>
                        <font color="#000000">1000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="2000" sdnum="1033;"><b>
                        <font color="#000000">2000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="3000" sdnum="1033;"><b>
                        <font color="#000000">3000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="4000" sdnum="1033;"><b>
                        <font color="#000000">4000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="6000" sdnum="1033;"><b>
                        <font color="#000000">6000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="8000" sdnum="1033;"><b>
                        <font color="#000000">8000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="125" sdnum="1033;"><b>
                        <font color="#000000">125</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="250" sdnum="1033;"><b>
                        <font color="#000000">250</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="500" sdnum="1033;"><b>
                        <font color="#000000">500</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="1000" sdnum="1033;"><b>
                        <font color="#000000">1000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="2000" sdnum="1033;"><b>
                        <font color="#000000">2000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="3000" sdnum="1033;"><b>
                        <font color="#000000">3000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="4000" sdnum="1033;"><b>
                        <font color="#000000">4000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="6000" sdnum="1033;"><b>
                        <font color="#000000">6000</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="8000" sdnum="1033;"><b>
                        <font color="#000000">8000</font>
                    </b></td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa tr-ac-bc">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="center" valign=middle><b>
                        <font color="#000000">AC</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_125_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_250_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_500_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_1000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_2000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_3000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_4000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_6000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_8000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_125_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_250_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_500_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_1000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_2000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_3000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_4000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_6000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'ac_8000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa tr-ac-bc">
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="center" valign=middle><b>
                        <font color="#000000">BC</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_125_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_250_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_500_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_1000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_2000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_3000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_4000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_6000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_8000_kanan')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_125_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_250_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_500_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_1000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_2000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_3000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_4000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_6000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                    <?= $form->field($modelAudiometri, 'bc_8000_kiri')->textInput(['maxlength' => true])->label(false) ?>
                </td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa">
                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; font-weight: bold;" colspan=2 height="19" align="left" valign=top>
                    <font color="#000000">Kesimpulan:</font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-right: 1px solid #000000" align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa">
                <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    AC
                </td>
                <td colspan=8 valign=bottom>
                    <?= $form->field($modelAudiometri, 'rata_kanan_ac')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td valign=bottom>
                    AC
                </td>
                <td style="border-right: 1px solid #000000" colspan=8 valign=bottom>
                    <?= $form->field($modelAudiometri, 'rata_kiri_ac')->textInput(['maxlength' => true])->label(false) ?>
                </td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa">
                <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    BC
                </td>
                <td colspan=8 valign=bottom>
                    <?= $form->field($modelAudiometri, 'rata_kanan_bc')->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td valign=bottom>
                    BC
                </td>
                <td style="border-right: 1px solid #000000" colspan=8 valign=bottom>
                    <?= $form->field($modelAudiometri, 'rata_kiri_bc')->textInput(['maxlength' => true])->label(false) ?>
                </td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa">
                <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="center" valign=bottom>
                    <font color="#000000">Kanan</font>
                </td>
                <td colspan=8 valign=bottom>
                    <?= $form->field($modelAudiometri, 'kesimpulan_kanan')->inline()->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal',], [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ])->label(false) ?>
                </td>
                <td valign=bottom>
                    <font color="#000000">Kiri</font>
                </td>
                <td style="border-right: 1px solid #000000" colspan=8 valign=bottom>
                    <?= $form->field($modelAudiometri, 'kesimpulan_kiri')->inline()->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal',], [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ])->label(false) ?>
                </td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa">
                <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-right: 1px solid #000000" align="left" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr style="<?= $model->tl_audiometri_periksa == 'Tidak' ? 'display: none' : null ?>" class="tr_audiometri_periksa">
                <td style="border-left: 1px solid #000000; border-bottom: 1px solid #000000; font-weight: bold;" colspan=2 height="19" align="left" valign=top>
                    <font color="#000000">Catatan</font>
                </td>
                <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000;" colspan=17 rowspan=3 align="left" valign=top>
                    <?= $form->field($modelAudiometri, 'kesimpulan')->textarea(['rows' => 6])->label(false) ?>
                </td>
            </tr>
        </table>

        <table class="table table-sm tabel-tht">
            <colgroup width="35"></colgroup>
            <colgroup width="207"></colgroup>
            <colgroup width="29"></colgroup>
            <colgroup span="4" width="160"></colgroup>
            <!-- <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=top sdval="10" sdnum="1033;">
                <font color="#000000">7</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <font color="#000000">AUDIOMETRI</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=top>
                <?= $form->field($model, 'audiometri')->textArea(['rows' => 3])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                <font color="#000000"><br></font>
            </td>
        </tr> -->
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=top sdval="10" sdnum="1033;">
                    <font color="#000000">8</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Lain-lain</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=top>
                    <?= $form->field($model, 'tl_lain_lain')->textArea(['rows' => 3])->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="19" align="left" valign=top><b>
                        <font color="#000000">II. HIDUNG</font>
                    </b></td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="1" sdnum="1033;">
                    <font color="#000000">1</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Meatus Nasi</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'hd_meatus_nasi',  ['id' => 'mcuspesialistht_hd_meatus_nasi_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->hd_meatus_nasi == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_hd_meatus_nasi_1" name="McuSpesialisTht[hd_meatus_nasi]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="2" sdnum="1033;">
                    <font color="#000000">2</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Septum Nasi</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'hd_septum_nasi',  ['id' => 'hd_septum_nasi', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top colspan="3">
                    <label>
                        <input <?= ($model->hd_septum_nasi == 'Deviasi ke') ? 'checked' : null ?> type="radio" id="hd_septum_nasi_1" name="McuSpesialisTht[hd_septum_nasi]" value="Deviasi ke">
                        Deviasi ke ...
                    </label>
                    <?= $form->field($model, 'hd_septum_nasi_lainnya')->textInput(['maxlength' => true])->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="3" sdnum="1033;">
                    <font color="#000000">3</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Konka Nasal</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'hd_konka_nasal',  ['id' => 'hd_konka_nasal', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top colspan="3">
                    <label>
                        <input <?= ($model->hd_konka_nasal == 'Oedema Lubang Hidung') ? 'checked' : null ?> type="radio" id="hd_konka_nasal_1" name="McuSpesialisTht[hd_konka_nasal]" value="Oedema Lubang Hidung">
                        Oedema Lubang Hidung ...
                    </label>
                    <?= $form->field($model, 'hd_konka_nasal_lainnya')->textInput(['maxlength' => true])->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="4" sdnum="1033;">
                    <font color="#000000">4</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Nyeri Ketok Sinus maksilar</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'hd_nyeri_ketok_sinus_maksilar',  ['id' => 'hd_nyeri_ketok_sinus_maksilar', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top colspan="3">
                    <label>
                        <input <?= ($model->hd_nyeri_ketok_sinus_maksilar == 'Nyeri Tekan Positif di') ? 'checked' : null ?> type="radio" id="hd_nyeri_ketok_sinus_maksilar_1" name="McuSpesialisTht[hd_nyeri_ketok_sinus_maksilar]" value="Nyeri Tekan Positif di">
                        Nyeri Tekan Positif di ...
                    </label>
                    <?= $form->field($model, 'hd_nyeri_ketok_sinus_maksilar_lainnya')->textInput(['maxlength' => true])->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="5" sdnum="1033;">
                    <font color="#000000">5</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Penciuman</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'hd_penciuman',  ['id' => 'mcuspesialistht_hd_penciuman_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->hd_penciuman == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_hd_penciuman_1" name="McuSpesialisTht[hd_penciuman]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="6" sdnum="1033;">
                    <font color="#000000">6</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Lain-lain</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=top>
                    <?= $form->field($model, 'hd_lain_lain')->textArea(['rows' => 3])->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="19" align="left" valign=top><b>
                        <font color="#000000">III. TENGGOROKAN</font>
                    </b></td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="1" sdnum="1033;">
                    <font color="#000000">1</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Pharynx</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tg_pharynx',  ['id' => 'mcuspesialistht_tg_pharynx_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tg_pharynx == 'Hiperemis') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tg_pharynx_1" name="McuSpesialisTht[tg_pharynx]" value="Hiperemis">
                        Hiperemis
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tg_pharynx == 'Granulasi') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tg_pharynx_2" name="McuSpesialisTht[tg_pharynx]" value="Granulasi">
                        Granulasi
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="2" sdnum="1033;">
                    <font color="#000000">2</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Tonsil</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>
                        Kanan : <?php
                                echo $form->field($model, 'tg_tonsil_kanan')->radioList(
                                    ['T0' => 'T0', 'T1' => 'T1', 'T2' => 'T2', 'T3' => 'T3',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                    </b>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>
                        Kiri : <?php
                                echo $form->field($model, 'tg_tonsil_kiri')->radioList(
                                    ['T0' => 'T0', 'T1' => 'T1', 'T2' => 'T2', 'T3' => 'T3',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                    </b>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="3" sdnum="1033;">
                    <font color="#000000">3</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Ukuran</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tg_ukuran_kanan',  ['id' => 'mcuspesialistht_tg_ukuran_kanan_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tg_ukuran_kanan == 'Hiperemis') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tg_ukuran_kanan_1" name="McuSpesialisTht[tg_ukuran_kanan]" value="Hiperemis">
                        Hiperemis
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tg_ukuran_kiri',  ['id' => 'mcuspesialistht_tg_ukuran_kiri_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tg_ukuran_kiri == 'Hiperemis') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tg_ukuran_kiri_1" name="McuSpesialisTht[tg_ukuran_kiri]" value="Hiperemis">
                        Hiperemis
                    </label>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="4" sdnum="1033;">
                    <font color="#000000">4</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Palatum</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <?= Html::activeRadio($model, 'tg_palatum',  ['id' => 'mcuspesialistht_tg_palatum_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <label>
                        <input <?= ($model->tg_palatum == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tg_palatum_1" name="McuSpesialisTht[tg_palatum]" value="Tidak Normal">
                        Tidak Normal
                    </label>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="5" sdnum="1033;">
                    <font color="#000000">5</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                    <font color="#000000">Lain-lain</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=top>
                    <?= $form->field($model, 'tg_lain_lain')->textArea(['rows' => 3])->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="19" align="center" valign=bottom>
                    <font color="#000000"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                    <font color="#000000"><br></font>
                </td>
            </tr>
            <!-- <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=3 height="58" align="left" valign=middle><b>
                    <font color="#000000">IV. KESIMPULAN</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=3 align="center" valign=bottom>
                <?= $form->field($model, 'kesimpulan')->textArea(['rows' => 4])->label(false) ?>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr> -->
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=3 height="58" align="left" valign=middle><b>
                        <font color="#000000">V. KESAN</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
                    <font color="#000000">:</font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=3 align="left" valign=bottom>
                    <?php
                    echo $form->field($model, 'kesan')->radioList(
                        ['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal',],
                        [
                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                            }
                        ]
                    )->label(false);
                    ?>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
        </table>

        <?php
        Pjax::begin(['id' => 'btn-cetak']);
        if (!$model->isNewRecord) {
            echo $form->field($model, 'id_spesialis_tht')->hiddenInput()->label(false);
        }
        ?>

        <div class="form-group">
            <?php
            if (array_key_exists('id', $_GET))
                echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
            if (!$model->isNewRecord)
                echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-tht/cetak', 'no_rm' => $no_rm, 'no_daftar' => $no_daftar], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
            ?>
        </div>
        <?php
        Pjax::end();
        ?>

        <?php ActiveForm::end(); ?>

        <hr>

        <?php
        $displayPenata = 'none';
        if ($model->kesan == 'Tidak Normal')
            $displayPenata = 'block';
        ?>
        <div class="div-penata" style="display: <?= $displayPenata ?>;">

            <h3>
                PERMASALAHAN PASIEN & RENCANAN PENATALAKSANAAN
            </h3>

            <?php $form = ActiveForm::begin([
                'id' => 'form-spesialis-tht-penata',
                'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
                'action' => ['/spesialis-tht/simpan-penata'],
            ]); ?>

            <div class="row">
                <?php echo $form->field($modelPenata, 'no_rekam_medik')->hiddenInput()->label(false); ?>
                <div class="col-sm-3">
                    <?php echo $form->field($modelPenata, 'jenis_permasalahan')->textArea(['rows' => 2]); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo $form->field($modelPenata, 'rencana')->textArea(['rows' => 2]); ?>
                </div>
                <div class="col-sm-2">
                    <?php echo $form->field($modelPenata, 'target_waktu')->textArea(['rows' => 2]); ?>
                </div>
                <div class="col-sm-2">
                    <?php echo $form->field($modelPenata, 'hasil_yang_diharapkan')->textArea(['rows' => 2]); ?>
                </div>
                <div class="col-sm-2">
                    <?php echo $form->field($modelPenata, 'keterangan')->textArea(['rows' => 2]); ?>
                </div>
            </div>

            <div class="form-group" style="margin-top: 5px;">
                <?php
                Pjax::begin(['id' => 'btn-cetak-penata']);
                if (!$model->isNewRecord)
                    echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
                // if (!$model->isNewRecord && count($modelPenataList->all())) {
                //     echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-tht/cetak-penata', 'no_rm' => $no_rm], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
                // }
                Pjax::end();
                ?>
            </div>

            <br>
            <?php Pjax::begin(['id' => 'tbl-penata']); ?>


            <?php Pjax::end(); ?>

        </div>
    </div>

</div>
<?php ActiveForm::end(); ?>

<?php

$this->registerJs($this->render('periksa-tht.js'), View::POS_END);
