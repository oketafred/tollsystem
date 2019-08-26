<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTollPlazaMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toll_plaza_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('lorry', 10, 2);
            $table->float('car', 10, 2);
            $table->float('bus', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toll_plaza_masters');
    }
}
