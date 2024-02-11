<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

class WC_List_Products
{
    use Single_Instance_Trait;

    /**
     * 
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