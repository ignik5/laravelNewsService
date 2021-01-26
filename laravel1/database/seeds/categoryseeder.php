<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=[
            [
               "category"=>"спорт",
                "name"=>"sport"
                ],
                 [
                 "category"=>"политика",
                 "name"=>"politics"
                 ]
                 ];

         DB:table('categories')->insert($category);
    }
}
