<?php

class AdminOrderController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$orderList = Order::getOrderList();

		require_once ROOT . '/views/admin_order/index.php';
	}

	public function actionUpdate($id)
	{
		self::checkAdmin();

		$order = Order::getOrderById($id);

		if (isset($_POST['submit'])) {
			$user_name = $_POST['user_name'];
			$user_phone = $_POST['user_phone'];
			$user_comment = $_POST['user_comment'];
			$date = $_POST['date'];
			$status = $_POST['status'];

			Order::updateOrderById($id, $user_name, $user_phone, $user_comment, $date, $status);

			header("Location: /admin/order");
			exit;
		}

		require_once ROOT . '/views/admin_order/update.php';
	}

	public function actionDelete($id)
	{
		self::checkAdmin();

		if (isset($_POST['submit'])) {
			Order::deleteOrderById($id);

			header("Location: /admin/order");
			exit;
		}

		require_once ROOT . '/views/admin_order/delete.php';
	}

	/**
	 * Action of the single order page
	 * @param $id
	 */
	public function actionView($id)
	{
		self::checkAdmin();

		$order = Order::getOrderById($id);

		// Get amount of products thanks to JSON
		$productsAmount = json_decode($order['products'], true);

		// Get array of products ids
		$productsIds = array_keys($productsAmount);

		$products = Product::getProductsByIds($productsIds);

		require_once ROOT . '/views/admin_order/view.php';
	}
}
