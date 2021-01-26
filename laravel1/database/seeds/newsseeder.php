<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class newsseeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData():array{
        $faker= Faker\Factory::create('ru_RU');
        $data=[];
      

            for ($i=0; $i < 10; $i++) { 
                $data[]=[
                    'title'=>$faker->sentence(rand(3,5)),
                    'text'=>$faker->sentence(rand(100,300)),
                    'isprivate'=>(bool)rand(0,1),
                    'image'=>"null"
                    

                ];
                
            }
      
        return $data;
    }
}
