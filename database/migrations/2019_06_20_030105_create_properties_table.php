<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('type');
            $table->string('address');
            $table->float('price', 15, 2);
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->text('summary');
            $table->boolean('available')->default(true);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('tenancy_expires_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
