<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateCountryUserTypeProviderVpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_user_type_provider_vps', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('usertype_id');
            $table->integer('provider_id');
            $table->text('title');
            $table->longText('description');
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
        Schema::dropIfExists('country_usertype_provider_vps');
    }
}
