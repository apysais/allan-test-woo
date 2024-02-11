<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

class WC_Get_Product
{
    use Single_Instance_Trait;

    /**
     * 
     */
    public function get($product_id)
    {

        $product = wc_get_product($product_id);

        return $product;
    }
}