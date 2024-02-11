<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

/**
 * This is to get all products.
 */
class WC_List_Products
{
    use Single_Instance_Trait;

    /**
     * get products.
     * 
     * @param array $args this can be overwritten as it uses wp_parse_args function. 
     * @return object
     */
    public function get_products($args = [])
    {
        $defaults = [
            'status' => 'publish',
            'limit' => '-1'
        ];
        
        $args = wp_parse_args($args, $defaults);

        $products = wc_get_products($args);

        return $products;
    }
}