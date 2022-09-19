<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateCountryProviderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_provider_services', function (Blueprint $table) {
            $table->id();
            $table->text('slug');
            $table->text('country_id');
            $table->text('provider_id');
            $table->text('icon');
            $table->text('name');
            $table->longText('description');
            $table->enum('status', [0, 1]);
            $table->text('usertypes')->nullable();
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
        Schema::dropIfExists('country_provider_services');
    }
}
