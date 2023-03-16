<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimony_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('testimony_id')->unsigned()->default(0);
            $table->string('locale')->index();
            $table->longText('description');
            $table->timestamps();

            // $table->unique(['post_category_id','locale']);
            $table->foreign('testimony_id')->references('id')->on('testimonies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimony_translations');
    }
}
