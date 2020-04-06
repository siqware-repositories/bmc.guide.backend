<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gallery_id')->unsigned();
            $table->string('title');
            $table->string('thumbnail');
            $table->longText('description');
            $table->string('location');
            $table->text('location_url');
            $table->string('category')->nullable()->default('default');
            $table->boolean('status')->default(false);
            $table->bigInteger('views')->nullable()->default(0);
            $table->foreign('gallery_id')
                ->references('id')
                ->on('galleries')
                ->onDelete('cascade');
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
        Schema::dropIfExists('restaurants');
    }
}
