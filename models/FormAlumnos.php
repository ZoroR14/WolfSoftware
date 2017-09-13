<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormAlumnos extends model{

public $id_alumno;
public $nombres;
public $apellidos;
public $clase;
public $nota_final;

public function rules()
 {
  return [
   ['id_alumno', 'integer', 'message' => 'Id incorrecto'],
   ['nombres', 'required', 'message' => 'Campo requerido'],
   ['nombres', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['nombres', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   ['apellidos', 'required', 'message' => 'Campo requerido'],
   ['apellidos', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['apellidos', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mínimo 3 máximo 80 caracteres'],
   ['clase', 'required', 'message' => 'Campo requerido'],
   ['clase', 'integer', 'message' => 'Sólo números enteros'],
   ['nota_final', 'required', 'message' => 'Campo requerido'],
   ['nota_final', 'number', 'message' => 'Sólo números'],
  ];
 }
 
}