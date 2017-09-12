<?php

namespace app\controllers;

use yii\web\Controller;


class PruebaController extends Controller
{
 
   
    
    public function actionIndex()
    {
        return $this->render('index', ['nombre'=>"Orlando",]
                );
    }
    
}




