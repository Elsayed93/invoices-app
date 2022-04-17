<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('products')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");

        /* `invoices`.`products` */
        $products = array(
            array('id' => '3', 'name' => 'منتج1', 'description' => 'وصف منتج1', 'section_id' => '6', 'created_at' => '2022-04-16 21:54:45', 'updated_at' => '2022-04-16 21:54:45'),
            array('id' => '4', 'name' => 'منتج2', 'description' => 'وصف منتج2', 'section_id' => '7', 'created_at' => '2022-04-16 21:55:03', 'updated_at' => '2022-04-16 21:55:03')
        );

        DB::table('products')->insert($products);
    }
}
