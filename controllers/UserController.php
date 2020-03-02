<?php

/**
 * Class UserController
 * Class for user actions manage
 */
class UserController {

    /**
     * Action for "Login" page
     */
    public function actionLogin() {
        // form data
        $name = $password = false;

        //if form submitted
        if (isset($_POST['submit'])) {

            // get form data
            $name = $_POST['name'];
            $password = $_POST['password'];

            // errors flag
            $errors = false;

            // check if user is manager
            $userId = User::checkUserData($name, $password);

            if (!$userId) {

                // if no - error
                $errors[] = 'Неправильные данные для входа';
            } else {

                // if yes - authenticate user (in session)
                User::auth($userId);

                // redirect manager to his cabinet
                header("Location: /manager");
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    /**
     * Action for manager logout
     */
    public function actionLogout() {

        // delete manager data from session
        unset($_SESSION['user']);

        // redirect user to main page
        header("Location: /");
    }

}