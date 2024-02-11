<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

class WC_Create_Or_Update_Product
{
    use Single_Instance_Trait;

    public function init($product_id = null)
    {
        $faker = Faker\Factory::create();
        
        if( is_null($product_id) ) {
            $product = new WC_Product();
        }else{
            $product = new WC_Product($product_id);    
        }

        $product->set_name( $faker->sentence(3) );
        $product->set_description( $faker->text() );

        //add or update custom fields, string
        $product->update_meta_data("allantest_string", $faker->word());

        //add or custom fields, date
        $product->update_meta_data("allantest_date", $faker->date());

        /**
         * add or update custom fields, boolean
         * set enable or disable flag
         * 1 is enable and 0 is disable
         * */
        $flag = $faker->boolean() ? 1 : 0;
        $product->update_meta_data("allantest_flag", $flag);

        //add or update custom fields, integer
        $product->update_meta_data("allantest_integer", $faker->randomDigitNotNull());

        //add or update custom fields, float
        $product->update_meta_data("allantest_float", $faker->randomFloat(2));

        //save
        $product_id = $product->save();

        //return product id
        return $product_id;
    }
}