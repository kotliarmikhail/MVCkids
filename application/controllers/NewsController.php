<?php

class NewsController {

    public function actionIndex()
    {
        echo 'Index';
        return true;
    }

    public function actionView(array $params)
    {
        echo 'View';
        return true;
    }
}