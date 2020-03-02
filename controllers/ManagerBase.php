<?php

/**
 * Abstract class ManagerBase 
 * contains common logic for manager panel controllers
 */
abstract class ManagerBase {

    /**
     * Checks if user is a manager
     * @return boolean
     */
    public function __construct() {

        $userId = User::checkLogged();

        if ($userId === 'admin') {
            return true;
        }

        die('Доступ запрещен!');
    }

}
