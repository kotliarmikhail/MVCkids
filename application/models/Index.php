<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.01.2018
 * Time: 20:13
 */

class Index
{

    /**
     * @param $id
     */
    public static function getIndexList()
    {

        $db = Db::getConnection();

        $IndexList = [];

        $result = $db->query('SELECT * FROM posts ORDER BY date ASC LIMIT 6');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $IndexList[$i]['id'] = $row['id'];
            $IndexList[$i]['title'] = $row['title'];
            $IndexList[$i]['date'] = $row['date'];
            $IndexList[$i]['description'] = $row['description'];
            $IndexList[$i]['content'] = $row['content'];
            $IndexList[$i]['image'] = $row['image'];
            $i++;
        }

        return $IndexList;
    }

    public static function getLastNews()
    {
        $db = Db::getConnection();

        $indexLastNews = [];

        $result = $db->query('SELECT * FROM posts ORDER BY date DESC LIMIT 6');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $indexLastNews[$i]['id'] = $row['id'];
            $indexLastNews[$i]['title'] = $row['title'];
            $indexLastNews[$i]['date'] = $row['date'];
            $indexLastNews[$i]['description'] = $row['description'];
            $indexLastNews[$i]['content'] = $row['content'];
            $indexLastNews[$i]['image'] = $row['image'];
            $i++;
        }

        return $indexLastNews;
    }

    public static function getLogoPictures()
    {
        return array_diff(scandir(ROOT . '/images/client-logos'), array('..', '.'));
    }
}