<?php

class News {

    /**
     * @param $id
     */
    public static function getNewsItemById($id) {

        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM posts WHERE id =' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    /**
     *
     */
    public static function getNewsList() {

        $db = Db::getConnection();

        $newsList = [];

        $result = $db->query('SELECT * FROM posts ORDER BY date DESC LIMIT 6');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['description'] = $row['description'];
            $newsList[$i]['content'] = $row['content'];
            $i++;
        }

        return $newsList;
    }
}