<?php

class UserController
{
    /**
     * Authorization
     */
    public function actionLogin()
    {
        if (isset($_POST['submit'])) {
            $errors = [];

            // Validation
            if (!User::checkEmail($_POST['email'])) {
                $errors['email'] = 'Entered email isn\'t valid';
            }

            if (!User::checkPassword($_POST['password'])) {
                $errors['password'] = 'Password must be longer than 6 chars';
            }

            // Does user exists
            $userId = User::checkUserData($_POST['email'], $_POST['password']);

            if ($userId == false) {
                $errors['wrong'] = 'No such user exists';
            } else {

                // Remember user in session
                User::auth($userId);

                header("Location: /cabinet");
                exit;
            }
        }

        require_once ROOT.'/views/user/login.php';
    }

    /**
     * Registration
     */
    public function actionRegister()
    {
        if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $errors = [];

            // Validation
            if (!User::checkName($_POST['name'])) {
                $errors['name'] = 'Name must be longer than 2 chars';
            }

            if (!User::checkEmail($_POST['email'])) {
                $errors['email'] = 'Entered email isn\'t valid';
            }

            if (!User::checkPassword($_POST['password'])) {
                $errors['password'] = 'Password must be longer than 6 chars';
            }

            if (User::checkEmailExists($_POST['email'])) {
                $errors['email'] = 'Email is already exists';
            }

            // If ok - Registration
            if (!count($errors)) {
                $result = User::register($_POST['name'], $_POST['email'], $_POST['password']);
            }
        }

        require_once ROOT.'/views/user/register.php';
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
        exit;
    }
}
