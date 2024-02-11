<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

/**
 * Use to get the product by product ID.
 * 
 */
class WC_Get_Product
{
    use Single_Instance_Trait;

    /**
     * get the product by ID.
     * 
     * @param init $product_id Woo Product ID.
     * @return object
     */
    public function get($product_id)
    {

        $product = wc_get_product($product_id);

        return $product;
    }
}