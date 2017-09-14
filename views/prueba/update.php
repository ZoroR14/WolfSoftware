<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("prueba/view") ?>">Ir a la lista de alumnos</a>

<h1>Editar alumno con id <?= Html::encode($_GET["id_alumnos"]) ?></h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "id_alumnos")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "nombres")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "apellidos")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "clase")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "nota_final")->input("text") ?>   
</div>

<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>