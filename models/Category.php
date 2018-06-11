<?php

class Category
{
	public static function getCategoryById($id)
	{
		$db = Db::getConnection();

		$sql = "SELECT * FROM category WHERE id = :id";

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$result->execute();

		return $result->fetch();
	}

    /**
     * Reads all categories where status is visible
     * @return array
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query("SELECT id, name FROM category WHERE status = 1 ORDER BY sort_order, name ASC");

        foreach ($result as $row) {
            $categoryList[] = array(
                'id' => $row['id'],
                'name' => $row['name']
            );
        }

        return $categoryList;
    }

	/**
	 * Reads all categories
	 * @return array
	 */
    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();

        $categoriesList = array();

        $result = $db->query("SELECT * FROM category ORDER BY sort_order ASC");

        foreach ($result as $row) {
            $categoriesList[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'sort_order' => $row['sort_order'],
                'status' => $row['status']
            ];
        }

        return $categoriesList;
    }

	/**
	 * Creates new category
	 * @param $name
	 * @param $sort_order
	 * @param $status
	 */
    public static function createCategory($name, $sort_order, $status)
	{
		$db = Db::getConnection();

		$sql = "INSERT INTO category 
			(name, sort_order, status) 
			VALUES 
			(:name, :sort_order, :status)";

		$result = $db->prepare($sql);

		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':sort_order', $sort_order, PDO::PARAM_INT);
		$result->bindParam(':status', $status, PDO::PARAM_INT);

		return $result->execute();
	}

	public static function updateCategory($id, $name, $sort_order, $status)
	{
		$db = Db::getConnection();

		$sql = "UPDATE category SET
			name = :name,
			sort_order = :sort_order,
			status = :status
		WHERE id = :id";

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':sort_order', $sort_order, PDO::PARAM_INT);
		$result->bindParam(':status', $status, PDO::PARAM_INT);

		$result->execute();
	}

	/**
	 * Deletes category
	 * @param $id
	 * @return bool
	 */
	public static function deleteCategoryById($id) {
		$db = Db::getConnection();

		$sql = "DELETE FROM category WHERE id = :id";

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();
	}
}
