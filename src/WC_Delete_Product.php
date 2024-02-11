<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

class WC_Delete_Product
{
    use Single_Instance_Trait;

    /**
     * 
     */
    public function delete($product_id, $force_delete = false)
    {
        $product = new WC_Product($product_id); 

        return $product->delete($force_delete);
    }
}