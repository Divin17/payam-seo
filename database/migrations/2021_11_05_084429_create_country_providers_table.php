<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateCountryProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_providers', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->text('name');
            $table->longText('description');
            $table->text('caption')->nullable();
            $table->text('caption_image')->nullable();
            $table->text('image');
            $table->text('setup_caption')->nullable();
            $table->text('setup_steps')->nullable();
            $table->enum('status', [0, 1])->default(1);
            $table->longText('metatags')->nullable();
            $table->text('slug');
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
        Schema::dropIfExists('country_providers');
    }
}
