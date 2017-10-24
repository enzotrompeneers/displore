<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->datetime('from');
            $table->datetime('to');
            $table->integer('capacity');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('availabilities', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availabilities');
        Schema::table('availabilities', function(Blueprint $table) {
            $table->dropForeign('availabilities_product_id_foreign');
        });
    }
}
