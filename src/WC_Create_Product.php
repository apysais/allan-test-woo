<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

/**
 * Create Product.
 * 
 * Use to Create Product.
 * 
 */
class WC_Create_Product
{
    use Single_Instance_Trait;

    public function create()
    {
        $faker = Faker\Factory::create();

        $product = new WC_Product();
        $product->set_name( $faker->sentence(3) );
        $product->set_description( $faker->text() );

        //add custom fields, string
        $product->update_meta_data("allantest_string", $faker->word());

        //add custom fields, date
        $product->update_meta_data("allantest_date", $faker->date());

        /**
         * add custom fields, boolean
         * set enable or disable flag
         * 1 is enable and 0 is disable
         * */
        $flag = $faker->boolean() ? 1 : 0;
        $product->update_meta_data("allantest_flag", $flag);

        //add custom fields, integer
        $product->update_meta_data("allantest_integer", $faker->randomDigitNotNull());

        //add custom fields, float
        $product->update_meta_data("allantest_float", $faker->randomFloat(2));

        //save
        $product_id = $product->save();

        //return product id
        return $product_id;
    }
}