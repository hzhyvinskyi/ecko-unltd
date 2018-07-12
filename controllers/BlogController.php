<?php

class BlogController
{
	public function actionIndex()
	{
		$articleList = Blog::getArticleList();

		require_once ROOT . '/views/blog/index.php';
	}

	public function actionArticle($id)
    {
        $article = Blog::getArticle($id);

        require_once ROOT . '/views/blog/view.php';
    }
}
