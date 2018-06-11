<?php

class CartController
{
    /**
     * Add item to shopping basket asynchronous request
     * @param int $id
     */
    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
    }

    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts(); // Get products ids and quantities in cart

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);

            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once ROOT.'/views/cart/index.php';
    }

    public function actionCheckout()
    {
        $categories = Category::getCategoriesList();

        // Order status
        $result = false;

        // Form was sent
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $comment = $_POST['comment'];

            $errors = [];

            // Validation
            if (!User::checkName($name)) {
                $errors['name'] = 'Name must be longer than 2 chars';
            }

            if (!User::checkEmail($email)) {
                $errors['email'] = 'Email is not valid';
            }

            if (!User::checkPhone($phone)) {
                $errors['phone'] = 'Phone number is not valid';
            }

            // If form filled correctly
            if (!count($errors)) {
                $productsInCart = Cart::getProducts();

                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged(); // Get user's id from $_SESSION['user']
                }

                // Insert order data to database
                $result = Order::save($name, $email, $phone, $comment, $userId, $productsInCart);

                // If insert war successful send email with order link to admin
                if ($result) {
                    $adminEmail = 'Hzhyvinskyi@gmail.com';
                    $subject = 'New order';
                    $message = 'http://site.com/admin/orders'; // Order link in admin panel

                    mail($adminEmail, $subject, $message);

                    Cart::clear();
                }

                // If form filled incorrectly
            } else {
                $productsInCart = Cart::getProducts(); // Get array of product ids and their quantity
                $productsIds = array_keys($productsInCart); // Get ids from this array
                $products = Product::getProductsByIds($productsIds); // Get all data of products by ids
                $totalPrice = Cart::getTotalPrice($products); // Get total price of all products in order
                $totalAmount = Cart::countItems(); // Get total amount of all products in order
            }

            // If form isn't filled yet
        } else {
            $productsInCart = Cart::getProducts();

            // Redirect to the main page if $_SESSION['products'] is empty
            if ($productsInCart == false) {
                header("Location: /");
            } else {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalAmount = Cart::countItems();

                // If user is authorized
                if (!User::isGuest()) {
                    $userId = User::checkLogged(); // Get user's id from $_SESSION['user']
                    $user = User::getUserById($userId); //

                    $name = $user['name'];
                    $email = $user['email'];
                }
            }
        }

        require_once ROOT.'/views/cart/checkout.php';
    }

    public function actionClear()
    {
        Cart::clear();

        header("Location: /cart");
    }

    public function actionDelete($id)
    {
        Order::deleteItemById($id);

        header("Location: /cart");
    }
}
