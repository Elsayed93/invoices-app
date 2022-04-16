<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('sections')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");

        /* `invoices`.`sections` */
        $sections = array(
            array('id' => '6', 'name' => 'قسم1', 'description' => 'وصف قسم1', 'created_at' => '2022-04-16 20:00:29', 'updated_at' => '2022-04-16 20:00:29'),
            array('id' => '7', 'name' => 'قسم2', 'description' => 'وصف قسم 2', 'created_at' => '2022-04-16 20:00:39', 'updated_at' => '2022-04-16 20:00:39'),
            array('id' => '8', 'name' => 'قسم 3', 'description' => 'وصف قسم 3', 'created_at' => '2022-04-16 20:00:51', 'updated_at' => '2022-04-16 20:00:51')
        );

        DB::table('sections')->insert($sections);
    }
}
