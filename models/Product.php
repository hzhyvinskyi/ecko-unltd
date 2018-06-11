<?php

class Product {
    const SHOW_BY_DEFAULT = 6;

    /**
     * @param int $count
     * @return array
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {
        $count = intval($count);

        $db = Db::getConnection();

        $productList = [];

        $result = $db->query("
            SELECT `id`, `name`, `price`, `image`, `is_new` 
            FROM `product`
            WHERE `status` = 1
            ORDER BY `id` DESC
            LIMIT $count
        ");

        foreach($result as $row) {
            $productList[] = ['id' => $row['id'], 'name' => $row['name'], 'price' => $row['price'], 'image' => $row['image'], 'is_new' => $row['is_new']];
        }

        return $productList;
    }


    /**
     * Returns an array of products
     * @param int $page
     * @param int $count
     * @return array
     */
    public static function getAllProducts($page, $count = self::SHOW_BY_DEFAULT) {
        $count = intval($count);
        $page = intval($page);

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $productList = [];

        $result = $db->query("
            SELECT `id`, `name`, `price`, `image`, `is_new` 
            FROM `product`
            WHERE `status` = 1
            ORDER BY `id` DESC
            LIMIT $count
            OFFSET $offset
        ");

        foreach($result as $row) {
            $productList[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image'],
                'is_new' => $row['is_new']
            ];
        }

        return $productList;
    }

    /**
     * Returns array of products by category
     * @param int $categoryId
     * @param int $page
     * @return array
     */
    public static function getProductListByCategory($categoryId = false, $page = 1) {
        if($categoryId) {
            $categoryId = intval($categoryId);
            $page = intval($page);

            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();

            $products = [];

            $result = $db->query("
                SELECT `id`, `name`, `price`, `image`, `is_new`
                FROM `product`
                WHERE `status` = 1 AND `category_id` = $categoryId
                ORDER BY `id` ASC
                LIMIT ".self::SHOW_BY_DEFAULT.
                " OFFSET ".$offset
            );

            foreach($result as $row) {
                $products[] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'price' => $row['price'],
                    'image' => $row['image'],
                    'is_new' => $row['is_new']
                ];
            }

            return $products;
        }
    }

    /**
     * Returns single product by id
     * @param $id
     * @return mixed
     */
    public static function getProductById($id) {
        $id = intval($id);

        if($id) {
            $db = Db::getConnection();

            $result = $db->query("
                SELECT *
                FROM `product`
                WHERE `id` = $id
            ");

            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    /**
     * Returns products by ids
     * @param $idsArray
     * @return array
     */
    public static function getProductsByIds($idsArray)
    {
        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status = 1 AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $products[] = [
                'id' => $row['id'],
                'code' => $row['code'],
                'name' => $row['name'],
                'price' => $row['price']
            ];
        }

        return $products;
    }

    /**
     * Returns amount of products in category
     * @param $categoryId
     * @return mixed
     */
    public static function getTotalProductsByCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query("
            SELECT COUNT(`id`) AS `count`
            FROM `product`
            WHERE `status` = 1
              AND `category_id` = ".$categoryId
        );

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['count'];
    }

    /**
     * Returns amount of products
     * @return mixed
     */
    public static function getTotalProducts()
    {
        $db = Db::getConnection();

        $result = $db->query("
            SELECT COUNT(`id`) AS `count`
            FROM `product`
            WHERE `status` = 1
        ");

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['count'];
    }

    /**
     * Returns list of recommended products
     * @return array
     */
    public static function getRecommendedProducts()
    {
        $db = Db::getConnection();

        $result = $db->query("
            SELECT id, name, price, image, is_new
            FROM product
            WHERE status = 1
            AND is_recommended = 1
            ORDER BY id DESC
        ");

        foreach ($result as $row) {
            $recommended[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image'],
                'is_new' => $row['is_new']
            ];
        }

        return $recommended;
    }

    public static function getProductList()
    {
        $db = Db::getConnection();

        $result = $db->query("
            SELECT id, code, name, price
            FROM product
        ");

        foreach ($result as $row) {
            $productList[] = [
                'id' => $row['id'],
                'code' => $row['code'],
                'name' => $row['name'],
                'price' => $row['price']
            ];
        }

        return $productList;
    }

    public static function createProduct($options)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO product "
            ."(name, category_id, code, price, availability, brand, "
            ."description, is_new, is_recommended, status) "
            ."VALUES (:name, :category_id, :code, :price, :availability, "
            .":brand, :description, :is_new, :is_recommended, :status)
        ";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($result->execute()) {
            return $db->lastInsertId();
        } else {
            return 0;
        }
    }

    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE product 
            SET 
                name = :name, 
                category_id = :category_id, 
                code = :code, 
                price = :price, 
                availability = :availability, 
                brand = :brand, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }

    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = "DELETE FROM product WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getImage($id)
	{
		$noImage = 'no-image.jpg';

		$path = '/upload/images/products/';

		$pathToProductImage = $path . $id . '.jpg';

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
			return $pathToProductImage;
		} else {
			return $path . $noImage;
		}
	}
}
