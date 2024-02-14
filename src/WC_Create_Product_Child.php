<?php
namespace AllanTest;

use WC_Product;
use Faker;
use AllanTest\Single_Instance_Trait;

class WC_Create_Product_Child extends WC_Create_Product
{
    use Single_Instance_Trait;

    protected $some_variable = 'test 2 test 2 test 2';
   
}