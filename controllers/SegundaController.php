<?php

namespace app\controllers;

use yii\web\Controller;


class SegundaController extends Controller
{
 
   
    
    public function actionMensajito()
    {
        return $this->render("saluda", ["Saludar" => "Hola que hace"]
                );
    }
    
}




