<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class CreateValuePropositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('value_propositions', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('metatags');
    }
}
