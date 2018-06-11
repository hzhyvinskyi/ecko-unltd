<?php

class Blog
{
	public static function getArticleList()
	{
		$db = Db::getConnection();

		$result = $db->query("
			SELECT id, title, short_content, image, date
			FROM blog
			WHERE status = 1
			ORDER BY sort_order DESC
		");

		foreach ($result as $row) {
			$articleList[] = [
				'id' => $row['id'],
				'title' => $row['title'],
				'short_content' => $row['short_content'],
				'image' => $row['image'],
				'date' => $row['date']
			];
		}

		return $articleList;
	}
}