<?php

class CleanCatalog
{
    /**
     * Delete a single product
     */
    public static function deleteProduct($id_product)
    {
        $product = new Product($id_product);
        return $product->delete();
    }

    /**
     * Delete all catalog products
     */
    public static function deleteAllProducts()
    {
        $sql = 'SELECT `id_product`
            FROM `' . _DB_PREFIX_ . 'product`';
        
        $products = Db::getInstance()
            ->executeS($sql);

        foreach ($products as $product) {
            self::deleteProduct($product['id_product']);
        }
    }
}