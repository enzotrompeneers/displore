<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class ForeignKeys extends Migration {

    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('product_images', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('product_images')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('product_reviews', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('product_reviews', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('reservations', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('reservations', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_user_id_foreign');
        });
        Schema::table('product_images', function(Blueprint $table) {
            $table->dropForeign('product_images_product_id_foreign');
        });
        Schema::table('product_reviews', function(Blueprint $table) {
            $table->dropForeign('product_reviews_user_id_foreign');
        });
        Schema::table('product_reviews', function(Blueprint $table) {
            $table->dropForeign('product_reviews_product_id_foreign');
        });
        Schema::table('reservations', function(Blueprint $table) {
            $table->dropForeign('reservations_product_id_foreign');
        });
        Schema::table('reservations', function(Blueprint $table) {
            $table->dropForeign('reservations_product_id_foreign');
        });
    }
}