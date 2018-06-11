<?php

class CabinetController
{
    public function actionIndex()
    {
        //get session id if it isset
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once ROOT.'/views/cabinet/index.php';
    }

    public function actionEdit()
    {
        // get session id if it isset
        $userId = User::checkLogged();

        // get user data by id
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        if (isset($_POST['submit'])) {
            $errors = [];

            $name = $_POST['name'];
            $password = $_POST['password'];

            if (!User::checkName($name)) {
                $errors['name'] = 'Name must be longer than 2 chars';
            }

            if (!User::checkPassword($password)) {
                $errors['password'] = 'Password must be longer than 6 chars';
            }

            if (!count($errors)) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once ROOT.'/views/cabinet/edit.php';
    }
}