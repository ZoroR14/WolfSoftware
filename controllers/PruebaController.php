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
use yii\helpers\Url;

class PruebaController extends Controller
{
    public function actionDelete()
    {
        if(Yii::$app->request->post())
        {
            $id_alumnos = Html::encode($_POST["id_alumnos"]);
            if((int) $id_alumnos)
            {
                if(Alumnos::deleteAll("id_alumnos=:id_alumnos", [":id_alumnos" => $id_alumnos]))
                {
                    echo "Alumno con id $id_alumnos eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("prueba/view")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el alumno, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("prueba/view")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el alumno, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("prueba/view")."'>";
            }
        }
        else
        {
            return $this->redirect(["prueba/view"]);
        }
    }
  
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


    


