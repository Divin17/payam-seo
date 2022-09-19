<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->default('');
            $table->text('capital', 255)->nullable();
            $table->text('citizenship', 255)->nullable();
            $table->string('country_code', 3)->default('');
            $table->text('currency', 255)->nullable();
            $table->text('currency_code', 255)->nullable();
            $table->text('currency_sub_unit', 255)->nullable();
            $table->text('currency_symbol', 3)->nullable();
            $table->integer('currency_decimals')->nullable();
            $table->text('full_name', 255)->nullable();
            $table->string('iso_3166_2', 2)->default('');
            $table->string('iso_3166_3', 3)->default('');
            $table->string('region_code', 3)->default('');
            $table->string('sub_region_code', 3)->default('');
            $table->boolean('eea')->default(0);
            $table->text('calling_code', 3)->nullable();
            $table->text('flag')->nullable();
            $table->text('slug');
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->text('priority')->nullable();
            $table->longText('metatags')->nullable();
            $table->enum('status', [0, 1])->default(0);
            $table->enum('published', [0, 1])->default(0);
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
        Schema::dropIfExists('countries');
    }
}
