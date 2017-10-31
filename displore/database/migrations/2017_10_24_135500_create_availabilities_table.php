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
            $table->datetime('date');
            $table->datetime('start_hour');
            $table->datetime('end_hour');
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
