<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('brand_id');
            
            $table->string("brand_title");
            $table->text("brand_description");            
            
            $table->tinyInteger("publication_status")->default(1);
            $table->tinyInteger("deletion_status")->default(0);
            
            $table->timestamps();
        });
        
        // Create Sample Categories
        DB::table('brands')->insert(
                array(
                    'brand_title' => 'Samsung',
                    'brand_description' => 'Samsung International',
                    'publication_status' => 1,
                    'deletion_status' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                )
        );
        
        DB::table('brands')->insert(
                array(
                    'brand_title' => 'Walton',
                    'brand_description' => 'Walton Bangladesh',
                    'publication_status' => 1,
                    'deletion_status' => 0,
                    'created_at' => date('Y-m-d H:i:s')
                )
        );
        
        DB::table('brands')->insert(
                array(
                    'brand_title' => 'Dholai Khal',
                    'brand_description' => 'Dholai Khal maney Quality Ponno',
                    'publication_status' => 1,
                    'deletion_status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                )
        );
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
