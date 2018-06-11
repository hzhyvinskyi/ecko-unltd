<?php

class Cart
{
    /**
     * Add product to the cart
     * @param int $id
     * @return int
     */
    public static function addProduct($id)
    {
        $id = intval($id);

        $productsInCart = [];

        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    /**
     * Returns amount of products if cart
     * @return int
     */
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;

            foreach ($_SESSION['products'] as $amounth) {
                $count += $amounth;
            }

            return $count;
        } else {
            return 0;
        }
    }

    /**
     * Return products from cart if they exists
     * @return bool
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        } else {
            return false;
        }
    }

    /**
     * Count total price of products in cart
     * @param array $products
     * @return float|int
     */
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        if ($productsInCart) {
            $total = 0;

            foreach($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    /**
     * Delete all products from cart
     */
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
}
