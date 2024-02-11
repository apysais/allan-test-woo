<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

/**
 * Use to update product.
 * Need to pass woo product ID.
 * 
 */
class WC_Update_Product
{
    use Single_Instance_Trait;

    /**
     * Update product.
     * 
     * @param init $product_id Woo Product ID.
     * @return object
     */
    public function update($product_id)
    {
        $faker = Faker\Factory::create();

        $product = new WC_Product($product_id);
        $product->set_name( $faker->sentence(3) );
        $product->set_description( $faker->text() );

        //update custom fields, string
        $product->update_meta_data("allantest_string", $faker->word());

        //update custom fields, date
        $product->update_meta_data("allantest_date", $faker->date());

        /**
         * update custom fields, boolean
         * set enable or disable flag
         * 1 is enable and 0 is disable
         * */
        $flag = $faker->boolean() ? 1 : 0;
        $product->update_meta_data("allantest_flag", $flag);

        //update custom fields, integer
        $product->update_meta_data("allantest_integer", $faker->randomDigitNotNull());

        //update custom fields, float
        $product->update_meta_data("allantest_float", $faker->randomFloat(2));

        //save
        $product_id = $product->save();

        //return product id
        return $product_id;
    }
}