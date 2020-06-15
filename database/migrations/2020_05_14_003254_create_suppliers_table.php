<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('mobile_two')->nullable();
            $table->string('mobile_three')->nullable();
            $table->string('email')->nullable();
            $table->string('position')->nullable();
            $table->string('city')->nullable();
            $table->string('address');
            $table->string('postal')->nullable();
            $table->string('cuit')->nullable();
            $table->string('website')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
