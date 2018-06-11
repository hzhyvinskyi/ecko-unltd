<?php

/**
 * Class AdminProductController
 * Product management is Admin Panel
 */
class AdminProductController extends AdminBase
{
	/**
	 * Action for "Product management page"
	 */
    public function actionIndex()
    {
        self::checkAdmin();

        $productList = Product::getProductList();

        require_once ROOT.'/views/admin_product/index.php';
    }

	/**
	 * Action for "Add product page"
	 */
    public function actionCreate()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = [];

            if (!isset($options['name']) || empty($options['name'])) {
                $errors['name'] = 'Name must exist';
            }

            if (!isset($options['code']) || empty($options['code'])) {
                $errors['code'] = 'Code must exist';
            }

            if (!isset($options['price']) || empty($options['price'])) {
                $errors['price'] = 'Price must exist';
            }

            if (!count($errors)) {
                $id = Product::createProduct($options); // Adding new product

				if ($id) {
					if (is_uploaded_file($_FILES['image']['tmp_name'])) {
						move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
					}
				}

                header("Location: /admin/product");
                exit;
            }
        }

        require_once ROOT.'/views/admin_product/create.php';
    }

	/**
	 * Action for "Edit product page"
	 * @param $id
	 */
    public function actionUpdate($id)
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        $product = Product::getProductById($id);

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = [];

            if (!isset($options['name']) || empty($options['name'])) {
                $errors['name'] = 'Name must exist';
            }

            if (!isset($options['code']) || empty($options['code'])) {
                $errors['code'] = 'Code must exist';
            }

            if (!isset($options['price']) || empty($options['price'])) {
                $errors['price'] = 'Price must exist';
            }

            if (!count($errors)) {
                Product::updateProductById($id, $options);

                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                	// If upload was successful, move file to the storage
                	move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
				}

                header("Location: /admin/product");
                exit;
            }
        }

        require_once ROOT.'/views/admin_product/update.php';
    }

	/**
	 * Action for 'Delete product page'
	 * @param $id
	 */
    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Product::deleteProductById($id);

            header("Location: /admin/product");
        }

        require_once ROOT.'/views/admin_product/delete.php';
    }
}
