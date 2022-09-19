<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateCountryUserTypeServiceStpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_user_type_service_stps', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('usertype_id');
            $table->integer('service_id');
            $table->text('title');
            $table->longText('description')->nullable();
            $table->text('image');
            $table->text('slug');
            $table->enum('status', [0, 1]);
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
        Schema::dropIfExists('country_usertype_service_stps');
    }
}
