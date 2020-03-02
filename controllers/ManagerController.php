<?php

/**
 * Class ManagerController
 * Pages in adminpanel
 */
class ManagerController extends ManagerBase {

    /**
     * Action for "Index" page
     */
    public function actionIndex() {

        require_once(ROOT . '/views/manager/index.php');
        return true;
    }

    /**
     * Action for "View news" page
     */
    public function actionView() {

        $newsList = News::getNewsList();

        require_once(ROOT . '/views/manager/view.php');
        return true;
    }

    /**
     * Action for "Create news" page
     */
    public function actionCreate() {

        //categories for dropdown menu
        $categoriesList = News::getLatestNewsInCategories();

        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['category'] = $_POST['category'];

            // errors flag
            $errors = false;

            // validate form
            if (!isset($options['title']) || empty($options['title']) ||
                    !isset($options['short_content']) || empty($options['short_content']) ||
                    !isset($options['content']) || empty($options['content']) ||
                    !isset($options['category']) || empty($options['category'])) {
                $errors[] = 'Заполните все поля';
            }

            if ($errors == false) {

                // add news
                $id = Manager::createNews($options);

                // if add
                if ($id) {

                    // check if image uploaded
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                        // if uploaded, move it to needed folder and give needed name
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/{$id}.jpg");
                    }
                }
                header("Location: /manager/view");
            }
        }
        require_once(ROOT . '/views/manager/create.php');
        return true;
    }

    /**
     * Action for "Update news" page
     * @param integer $id news id
     */
    public function actionUpdate($id) {

        $newsItem = News::getNewsItemByID($id);

        //categories for dropdown menu
        $categoriesList = News::getLatestNewsInCategories();

        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['category'] = $_POST['category'];

            // errors flag
            $errors = false;

            // validate form
            if (!isset($options['title']) || empty($options['title']) ||
                    !isset($options['short_content']) || empty($options['short_content']) ||
                    !isset($options['content']) || empty($options['content']) ||
                    !isset($options['category']) || empty($options['category'])) {
                $errors[] = 'Заполните все поля';
            }

            if ($errors == false) {

                // update news
                $result = Manager::updateNewsById($id, $options);


                // if updated
                if ($result) {

                    // check if image uploaded
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                        // if uploaded, move it to needed folder and give needed name
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/{$id}.jpg");
                    }
                }
                header("Location: /manager/view");
            }
        }
        require_once(ROOT . '/views/manager/update.php');
        return true;
    }

    /**
     * Action for "Delete news" page
     * @param integer $id news id
     */
    public function actionDelete($id) {

        if (isset($_POST['submit'])) {
            
            Manager::deleteNewsById($id);

            header("Location: /manager/view");
        }
        require_once(ROOT . '/views/manager/delete.php');
        return true;
    }

}
