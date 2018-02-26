<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('products_id');
            
            $table->string("product_title");
            $table->string("product_image")->default("");
            
            $table->text("product_teaser");
            $table->text("product_description");
            
            $table->string("product_model");
            $table->string("product_options");
            
            $table->string("product_quantity");
            $table->string("product_price");
            $table->string("product_minimum_order");            
            
            $table->string("product_stock");
            $table->string("product_reorder_level");
                        
            
            $table->tinyInteger("publication_status")->default(1);
            $table->tinyInteger("deletion_status")->default(0);
            
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
        Schema::dropIfExists('products');
    }
}
