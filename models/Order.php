<?php

class Order
{
    /**
     * Save order data to database
     * @param string $user_name
     * @param string $user_email
     * @param string $user_phone
     * @param string $user_comment
     * @param int $userId
     * @param string $products
     * @return bool
     */
    public static function save($user_name, $user_email, $user_phone, $user_comment, $userId, $products)
    {
        $products = json_encode($products);

        $db = Db::getConnection();

        $sql = "INSERT INTO product_order "
            ."(user_name, user_email, user_phone, user_comment, user_id, products) "
            ."VALUES (:user_name, :user_email, :user_phone, :user_comment, :user_id, :products)";

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $result->bindParam(':user_email', $user_email, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $user_phone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $user_comment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Deletes Product by id
     * @param int $id
     */
    public static function deleteItemById($id)
    {
        if (isset($_SESSION['products'][$id])) {
            unset($_SESSION['products'][$id]);
        }
    }

    public static function getOrderList()
	{
		$db = Db::getConnection();

		$orderList = [];

		$result = $db->query("SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id");

		foreach ($result as $row) {
			$orderList[] = [
				'id' => $row['id'],
				'user_name' => $row['user_name'],
				'user_phone' => $row['user_phone'],
				'date' => $row['date'],
				'status' => $row['status']
			];
		}

		return $orderList;
	}

	public static function getOrderById($id)
	{
		$db = Db::getConnection();

		$sql = "SELECT * FROM product_order WHERE id = :id";

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$result->execute();

		return $result->fetch();
	}

	public static function updateOrderById($id, $user_name, $user_phone, $user_comment, $date, $status)
	{
		$db = Db::getConnection();

		$sql = "UPDATE product_order SET
			id = :id,
			user_name = :user_name,
			user_phone = :user_phone,
			user_comment = :user_comment,
			date = :date,
			status = :status
		WHERE id = :id";

		$result = $db->prepare($sql);

		$result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
		$result->bindParam(':user_phone', $user_phone, PDO::PARAM_STR);
		$result->bindParam(':user_comment', $user_comment, PDO::PARAM_STR);
		$result->bindParam(':date', $date, PDO::PARAM_STR);
		$result->bindParam(':status', $status, PDO::PARAM_INT);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();
	}

	public static function deleteOrderById($id)
	{
		$db = Db::getConnection();

		$sql = "DELETE FROM product_order WHERE id = :id";

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();
	}

	/**
	 * Returns text description of order's status
	 * @param $status
	 * @return string
	 */
	public static function getStatusText($status)
	{
		switch ($status) {
			case '1':
				return 'new order';
				break;
			case '2':
				return 'in processing';
				break;
			case '3':
				return 'delivering';
				break;
			case '4':
				return 'closed';
				break;
			default:
				return '';
		}
	}
}
