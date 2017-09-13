<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Crear Alumno</h1>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>
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

<?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>