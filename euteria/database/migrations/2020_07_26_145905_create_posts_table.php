<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_id')->index();
            $table->bigInteger('post_category_id')->nullable()->default(0);
            $table->bigInteger('post_subcategory_id')->nullable()->default(0);
            $table->bigInteger('post_brand_id')->nullable()->default(0);
            $table->bigInteger('ms_provinsi_id')->nullable()->default(0);
            $table->bigInteger('ms_kota_id')->nullable()->default(0);
            $table->bigInteger('ms_kecamatan_id')->nullable()->default(0);
            
            // $table->longText('link')->nullable();            
            $table->date('post_date')->nullable();            
            $table->string('email')->nullable();
            $table->string('coordinate')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('sku')->nullable();
            $table->string('brochure')->nullable();
            $table->string('certificate')->nullable();
            $table->json('marketplace_link')->nullable();

            $table->string('keywords')->nullable();
            $table->bigInteger('view_count')->nullable()->default(100);            
            $table->tinyInteger('is_slideshow')->comment('0:tidak, 1:ya')->default(0);
            $table->tinyInteger('status')->comment('0:draft, 1:active, 2:')->default(1);
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
