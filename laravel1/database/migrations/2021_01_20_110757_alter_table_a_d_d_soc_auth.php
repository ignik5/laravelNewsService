<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableADDSocAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function(Blueprint $table){
            $table->string('id_in_soc', 20)
            ->default('')
            ->comment('id в соцсети');
             $table->enum('type_auth', ['site','vk','fb'])
                ->default('site')
                ->comment('тип используемой авторизации');
            $table->string('avatar', 150)
                ->default('')
                ->comment('ссылкка на аватарку');
                $table->index('id_in_soc');

                });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
          
            $table->dropColum(['id_in_soc','type_auth','avatar']);
            });
    }
}
