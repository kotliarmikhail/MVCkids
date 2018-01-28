<?php

include_once ROOT . '/application/models/News.php';

class NewsController {

    public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getNewsList();
        echo '<pre>';
        print_r($newsList);
        echo '<pre>';
        //require_once (ROOT . '/application/views/news/contact.phtml');
        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);
            echo '<pre>';
            print_r($newsItem);
            echo '<pre>';
        }
        return true;
    }
}