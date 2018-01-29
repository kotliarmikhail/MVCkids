<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.01.2018
 * Time: 20:06
 */
include_once ROOT . '/application/models/Index.php';

class IndexController
{

    public function actionIndex()
    {
        $IndexList = [];
        $IndexList = Index::getIndexList();

        $indexLastNews = [];
        $indexLastNews = Index::getLastNews();

        $logoPictures =[];
        $logoPictures = Index::getLogoPictures();

        require_once(ROOT . '/application/views/news/index.phtml');
        return true;
    }

    public function actionView($id)
    {

        if ($id) {


           // $newsItem = News::getNewsItemById($id);
            require_once(ROOT . '/application/views/news/blog-post.phtml');
        }

        return true;
    }


}