<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ValidarFormulario;
use app\models\ValidarFormularioAjax;
use yii\widgets\ActiveForm;
use yii\web\Response;
use app\models\FormAlumnos;
use app\models\Alumnos;
use app\models\FormSearch;
use yii\helpers\Html;

class PruebaController extends Controller
{
  
   public function actionCrear() {
        $model = new FormAlumnos;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new alumnos;
                $table->nombres = $model->nombres;
                $table->apellidos = $model->apellidos;
                $table->clase = $model->clase;
                $table->nota_final = $model->nota_final;
                if ($table->insert())
                {
                    $msg = "Enhorabuena registro guardado correctamente";
                    $model->nombres = null;
                    $model->apellidos = null;
                    $model->clase = null;
                    $model->nota_final = null;
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("create", ['model' => $model, 'msg' => $msg]);
    }
    
    public function actionView()
    {
        $table = new Alumnos;
        $model = $table->find()->all();
        $form = new FormSearch;
        $search = null;
       if($form->load(Yii::$app->request->get()))
        {
            if ($form->validate())
            {
                $search = Html::encode($form->q);
                $query = "SELECT * FROM alumnos WHERE id_alumnos LIKE '%$search%' OR ";
                $query .= "nombres LIKE '%$search%' OR apellidos LIKE '%$search%'";
                $model = $table->findBySql($query)->all();
            }
            else
            {
                $form->getErrors();
            }
        }
         return $this->render("view", ["model" => $model, "form" => $form, "search" => $search]);
    }
  
    // Prueba del domingo //
    public function actionIndex()
    {
        return $this->render('index', ['mensaje_bienvenida'=>"Este es el inicio del proyecto"]
                );
    }
   }


    


