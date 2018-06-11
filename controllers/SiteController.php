<?php

class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts();

        $recommended = Product::getRecommendedProducts();

        // Main page
        require_once ROOT.'/views/site/index.php';
    }

    public function actionContact()
    {
        $result = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $text = $_POST['text'];
            $errors = [];

            if (!User::checkEmail($email)) {
                $errors['email'] = 'Email is not valid';
            }

            if (empty($text)) {
                $errors['text'] = 'Type some text';
            }

            if (!count($errors)) {
                $adminEmail = 'Hzhyvinskyi@gmail.com';
                $subject = 'Ecko Unltd.';
                $message = "Text: {$text}. From {$email}";

                $result = mail($adminEmail, $subject, $message);
            }
        }

        require_once ROOT.'/views/site/contact.php';
    }

    public function actionPage404()
    {
        require_once ROOT . '/views/site/page404.php';
    }

    public function actionAbout()
	{
		require_once ROOT . '/views/site/about.php';
	}
}
