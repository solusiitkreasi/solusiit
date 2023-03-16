<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_category_id')->unsigned()->default(0);
            $table->string('locale')->index();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->unique(['post_category_id','locale']);
            $table->foreign('post_category_id')->references('id')->on('post_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_category_translations');
    }
}
