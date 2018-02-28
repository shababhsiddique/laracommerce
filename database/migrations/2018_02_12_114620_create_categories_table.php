<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_id');
            
            $table->string("category_title");
            $table->text("category_description");
//            $table->string("category_image")->default("");
            
            
            $table->tinyInteger("publication_status")->default(1);
            $table->tinyInteger("deletion_status")->default(0);
            $table->timestamps();
        });


        // Create Sample Categories
        DB::table('categories')->insert(
                array(
                    'category_title' => 'Home Appliances',
                    'category_description' => 'Electronics for the home',
//                    'category_image' => '',
                    'publication_status' => 1,
                    'deletion_status' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                )
        );

        DB::table('categories')->insert(
                array(
                    'category_title' => 'Computer Accessories',
                    'category_description' => 'Computer Peripherals and accessories',
//                    'category_image' => '',
                    'publication_status' => 1,
                    'deletion_status' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                )
        );


        DB::table('categories')->insert(
                array(
                    'category_title' => 'Mobile Devices',
                    'category_description' => 'Mobile and Tablet Devices',
//                    'category_image' => '',
                    'publication_status' => 1,
                    'deletion_status' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                )
        );

        DB::table('categories')->insert(
                array(
                    'category_title' => 'Healthcare',
                    'category_description' => 'Healthcare Items',
//                    'category_image' => '',
                    'publication_status' => 1,
                    'deletion_status' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                )
        );
        
        DB::table('categories')->insert(
                array(
                    'category_title' => 'Gaming',
                    'category_description' => 'Gaming Items',
//                    'category_image' => '',
                    'publication_status' => 1,
                    'deletion_status' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('categories');
    }

}
