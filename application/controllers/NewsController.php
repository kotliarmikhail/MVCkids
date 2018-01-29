<?php

include_once ROOT . '/application/models/News.php';

class NewsController {

    public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getNewsList();


        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);
            require_once (ROOT . '/application/views/news/blog-post.phtml');
        }
        return true;
    }
}