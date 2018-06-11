<?php

class BlogController
{
	public function actionIndex()
	{
		$articleList = Blog::getArticleList();

		require_once ROOT . '/views/blog/index.php';
	}
}
