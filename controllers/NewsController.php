<?php

/**
 * Class for news manages
 */
class NewsController {

    /**
     * Action for render all news
     * @return boolean
     */
    public function actionIndex() {
        
        //latest news in each category for header menu
        $latestNewsInCategories = News::getLatestNewsInCategories();

        $newsList = News::getNewsList();

        require_once(ROOT . '/views/news/index.php');

        return true;
    }

    /**
     * Action for render one news by id
     * @param integer $id news id
     * @return boolean
     */
    public function actionView($id) {

        //latest news in each category for header menu
        $latestNewsInCategories = News::getLatestNewsInCategories();

        $newsItem = News::getNewsItemByID($id);

        require_once(ROOT . '/views/news/view.php');

        return true;
    }

    /**
     * Action for render news in needed category
     * @param string $category news category
     * @return boolean
     */
    public function actionCategory($category) {

        //latest news in each category for header menu
        $latestNewsInCategories = News::getLatestNewsInCategories();

        $newsInCategory = News::getNewsInCategory($category);

        require_once(ROOT . '/views/news/category.php');


        return true;
    }

}
