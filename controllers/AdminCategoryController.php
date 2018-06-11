<?php

/**
 * Class AdminCategoryController
 * Category management in Admin Panel
 */
class AdminCategoryController extends AdminBase
{
	/**
	 * Action for "Category management page"
	 */
	public function actionIndex()
	{
		self::checkAdmin();

		$categoryList = Category::getCategoriesListAdmin();

		require_once ROOT . '/views/admin_category/index.php';
	}

	/**
	 * Action for "Create category page"
	 */
	public function actionCreate()
	{
		self::checkAdmin();

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$sort_order = $_POST['sort_order'];
			$status = $_POST['status'];

			$errors = [];

			// Validation
			if (!isset($name) || empty($name)) {
				$errors['name'] = 'Name must exist';
			}

			if (!isset($sort_order) || empty($sort_order)) {
				$errors['sort_order'] = 'Code must exist';
			}

			if (!count($errors)) {
				Category::createCategory($name, $sort_order, $status);

				header("Location: /admin/category");
				exit;
			}
		}

		require_once ROOT . '/views/admin_category/create.php';
	}

	/**
	 * Action for "Edit category page"
	 * @param $id
	 */
	public function actionUpdate($id)
	{
		self::checkAdmin();

		$category = Category::getCategoryById($id);

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$sort_order = $_POST['sort_order'];
			$status = $_POST['status'];

			$errors = [];

			// Validation
			if (!isset($name) || empty($name)) {
				$errors['name'] = 'Name must exist';
			}

			if (!isset($sort_order) || empty($sort_order)) {
				$errors['sort_order'] = 'Code must exist';
			}

			if (!count($errors)) {
				Category::updateCategory($id, $name, $sort_order, $status);

				header("Location: /admin/category");
				exit;
			}
		}

		require_once ROOT . '/views/admin_category/update.php';
	}

	/**
	 * Action for "Delete category page"
	 * @param $id
	 */
	public function actionDelete($id)
	{
		self::checkAdmin();

		$category = Category::getCategoryById($id);

		if (isset($_POST['submit'])) {
			Category::deleteCategoryById($id);

			header("Location: /admin/category");
			exit;
		}

		require_once ROOT . '/views/admin_category/delete.php';
	}
}
