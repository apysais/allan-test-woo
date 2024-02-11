<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

/**
 * Delete Product.
 */
class WC_Delete_Product
{
    use Single_Instance_Trait;

    /**
     * delete the product.
     * 
     * @param init $product_id Woo Product ID.
     * @param boolean $force_delete, set to true to delete or false to trash, default is false.
     * @return boolean
     */
    public function delete($product_id, $force_delete = false)
    {
        $product = new WC_Product($product_id); 

        return $product->delete($force_delete);
    }
}