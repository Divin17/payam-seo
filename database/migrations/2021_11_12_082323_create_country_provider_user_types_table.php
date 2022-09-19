<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateCountryProviderUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_provider_user_types', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('provider_id');
            $table->text('slug');
            $table->text('name');
            $table->longText('description');
            $table->text('icon')->nullable();
            $table->text('caption')->nullable();
            $table->text('caption_image')->nullable();
            $table->enum('status', [0, 1])->default(1);
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
        Schema::dropIfExists('country_provider_user_types');
    }
}
