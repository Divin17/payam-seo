<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->text('slug');
            $table->text('name');
            $table->text('image');
            $table->enum('status', [0, 1])->default(1);
            $table->text('caption')->nullable();
            $table->text('caption_image')->nullable();
            $table->text('setup_caption')->nullable();
            $table->text('setup_steps')->nullable();
            $table->longText('metatags')->nullable();
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
        Schema::dropIfExists('networks');
    }
}
