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
            $table->increments('product_id');
            
            $table->string("product_title");
            $table->string("product_image")->default("");
            $table->string("product_slug")->default("");
            
            $table->text("product_teaser")->nullable();
            $table->text("product_description")->nullable();
                        
            $table->integer('category_id');
            $table->integer('brand_id');
            
            $table->string("product_model");
            $table->string("product_options")->default("");
            
            $table->string("product_quantity");
            $table->string("product_price");
            $table->string("product_minimum_order");            
            $table->string("product_reorder_level");
            
            $table->tinyInteger("popular_status")->default(0);
            $table->tinyInteger("featured_status")->default(0);
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
