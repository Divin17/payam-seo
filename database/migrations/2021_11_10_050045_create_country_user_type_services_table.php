<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateCountryUserTypeServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_user_type_services', function (Blueprint $table) {
            $table->id();
            $table->text('slug');
            $table->integer('country_id');
            $table->integer('usertype_id');
            $table->text('icon');
            $table->text('name');
            $table->longText('description');
            $table->text('caption')->nullable();
            $table->text('caption_image')->nullable();
            $table->text('setup_caption')->nullable();
            $table->text('setup_steps')->nullable();
            $table->text('providers')->nullable();
            $table->enum('status', [0, 1])->default(1);
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
        Schema::dropIfExists('country_user_type_services');
    }
}
