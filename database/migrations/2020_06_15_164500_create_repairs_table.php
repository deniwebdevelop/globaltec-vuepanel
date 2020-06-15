<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('lab');
            $table->date('entry');
            $table->date('sent');
            $table->date('dev');
            $table->date('deliver');
            $table->string('serial');
            $table->integer('labcost');
            $table->integer('sparecost');
            $table->integer('shipcost');
            $table->integer('markup');
            $table->string('file')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
    });
    }
    public function down()
    {
        Schema::dropIfExists('repairs');
    }
}
