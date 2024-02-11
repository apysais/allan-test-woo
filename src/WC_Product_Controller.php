<?php
namespace AllanTest;

use AllanTest\WC_Create_Product;
use AllanTest\WC_List_Products;
use AllanTest\WC_Get_Product;
use AllanTest\WC_Delete_Product;
use AllanTest\WC_Update_Product;
use AllanTest\WC_Create_Or_Update_Product;
use AllanTest\Single_Instance_Trait;

/**
 * Use for controller via URL query parameters method.
 */
class WC_Product_Controller
{
    use Single_Instance_Trait;

    /**
     * Initialize the controller
     */
    public function init()
    {
        /**
         * Check if the query parameter is set.
         */
        if( isset($_GET['allan-test-action']) ) {

            //check if the action is to create
            if( sanitize_text_field($_GET['allan-test-action']) == 'create' ) {
                return $this->create();
            }

            //check if the action is to bulk create
            if( sanitize_text_field($_GET['allan-test-action']) == 'bulk-create' ) {
                //get the limit of bulk creation.
                $bulk_create_limit = isset( $_GET['bulk-create-limit'] ) ? sanitize_text_field( $_GET['bulk-create-limit'] ) : 1;
                $this->create_bulk($bulk_create_limit);
            }

            //check if the action is update
            if( sanitize_text_field($_GET['allan-test-action']) == 'update' ) {
                //check if the product id is set.
                $product_id = isset( $_GET['product-id'] ) ? sanitize_text_field( $_GET['product-id'] ) : null;

                if( ! empty($product_id) ) {
                    return $this->update($product_id);
                }
            }

            //check if the action is delete
            if( sanitize_text_field($_GET['allan-test-action']) == 'delete' ) {
                //check if the product id is set.
                $product_id = isset( $_GET['product-id'] ) ? sanitize_text_field( $_GET['product-id'] ) : null;

                //check if the force delete is set.
                $force_delete = isset( $_GET['force-delete'] ) ? sanitize_text_field( $_GET['force-delete'] ) : false;

                if( ! empty($product_id) ) {
                    return $this->delete($product_id, $force_delete);
                }
            }

            /**
             * Check if the 
             */
            if( sanitize_text_field($_GET['allan-test-action']) == 'list' ) {
                return $this->get_products();
            }

            if( sanitize_text_field($_GET['allan-test-action']) == 'get' ) {
                //check if the product id is set.
                $product_id = isset( $_GET['product-id'] ) ? sanitize_text_field( $_GET['product-id'] ) : null;
                if( ! empty($product_id) ) {
                   return $this->get_product($product_id);
                }
                
            }
        }

    }

    /**
     * Create product.
     * 
     * @return int product id.
     */
    private function create()
    {
        $create_product = new WC_Create_Or_Update_Product;
        return $create_product->init();
    }

    /**
     * Create item by bulk.
     * 
     * @param init $limit_bulk The total bulk creation, default one
     * @return void
     */
    private function create_bulk($limit_bulk = 1)
    {
        for($i = 1; $i <= $limit_bulk; $i++ ) {
            $create_product = new WC_Create_Or_Update_Product;
            $create_product->init();
        }
    }

    /**
     * Update product.
     * 
     * @param int $product_id the product ID.
     * @return int product id.
     */
    private function update($product_id)
    {
        $update = new WC_Create_Or_Update_Product;
        return $update->init($product_id);
    }

    /**
     * 
     */
    private function delete($product_id, $force_delete = false)
    {
        $delete = new WC_Delete_Product;
        $delete->delete($product_id, $force_delete);
    }

    private function get_products($args = [])
    {
        $lists = new WC_List_Products;
        return $lists->get_products($args);
    }

    private function get_product($product_id)
    {
        $get = new WC_Get_Product;
        return $get->get($product_id);
    }
}