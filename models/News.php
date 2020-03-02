<?php

class News {

    /**
     * Returns single news item with specified id
     * @param int $id news id
     * @return array
     */
    public static function getNewsItemByID($id) {

        $id = intval($id);

        $db = Db::getConnection();
        $sql = 'SELECT * FROM news WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $newsItem = $result->fetch();
        
        return $newsItem;
    }

    /**
     * Returns an array of news
     * @return array
     */
    public static function getNewsList() {

        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT id, title, date, author_name, short_content, content, category FROM news ORDER BY date DESC');

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['category'] = $row['category'];
            $i++;
        }

        return $newsList;
    }

    /**
     * Returns an array of latest news in each category
     * @return array
     */
    public static function getLatestNewsInCategories() {

        $latestNewsInCategories = array();

        $db = Db::getConnection();

        $result = $db->query("SELECT news.id, news.category, news.title, news.date FROM `news` INNER JOIN "
                . "(SELECT MAX(date) as md, category FROM news GROUP BY category) aux ON "
                . "(news.category=aux.category and news.date=aux.md) ORDER BY date DESC");

        $i = 0;
        while ($row = $result->fetch()) {
            $latestNewsInCategories[$i]['id'] = $row['id'];
            $latestNewsInCategories[$i]['category'] = $row['category'];
            $latestNewsInCategories[$i]['title'] = $row['title'];
            $i++;
        }
        return $latestNewsInCategories;
    }

    /**
     * Returns an array of news in category
     * @param string $category category name
     * @return array
     */
    public static function getNewsInCategory($category) {

        $db = Db::getConnection();
        $sql = 'SELECT id, title, date, author_name, short_content, category FROM news '
                . 'WHERE category = :category ORDER BY date DESC';

        $result = $db->prepare($sql);
        $result->bindParam(':category', $category, PDO::PARAM_STR);
        $result->execute();
        
        $i = 0;
        $newsInCategory = array();
        while ($row = $result->fetch()) {
            $newsInCategory[$i]['id'] = $row['id'];
            $newsInCategory[$i]['title'] = $row['title'];
            $newsInCategory[$i]['date'] = $row['date'];
            $newsInCategory[$i]['author_name'] = $row['author_name'];
            $newsInCategory[$i]['short_content'] = $row['short_content'];
            $newsInCategory[$i]['category'] = $row['category'];
            $i++;
        }

        return $newsInCategory;
    }
    
     /**
     * Returns image path
     * @param integer $id news id (image id)
     * @return string path to image
     */
    public static function getImage($id) {
        // empty image (if no images)
        $noImage = 'no-image.jpg';

        // path to images folder
        $path = '/template/images/';

        // path to news image
        $pathToNewsImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToNewsImage)) {

            // if image exist, returns its path
            return $pathToNewsImage;
        }

        // if image no exist, return empty image path
        return $path . $noImage;
    }


}
