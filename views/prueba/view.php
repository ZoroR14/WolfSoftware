<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<a href="<?=Url::toRoute("prueba/crear")?>">Crear un nuevo alumno</a>

<?php
    $f = ActiveForm::begin([
            "method" => "get",
            "action" => Url::toRoute ("prueba/view"),
            "enableClientValidation" => "true"
            ]);
?>
    <div class="form-group">
    <?= $f->field($form, "q")->input("search") ?>
    </div>

    <?= Html::submitButton("Buscar", ["class" => "btn btn-primary"]) ?>

<?php $f->end() ?>
<h3><?= $search ?></h3>

<h3>Lista de alumnos</h3>
<table class="table table-bordered">
    <tr>
        <th>Id_Alumno</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Clase</th>
        <th>Nota_Final</th>
        <th></th>
        <th></th>
    </tr>
        <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_alumnos ?></td>
        <td><?= $row->nombres ?></td>
        <td><?= $row->apellidos ?></td>
        <td><?= $row->clase ?></td>
        <td><?= $row->nota_final ?></td>
        <td><a href="#">Editar</a></td>
        <td><a href="#">Eliminar</a></td>
    </tr>
    <?php endforeach ?>
</table>