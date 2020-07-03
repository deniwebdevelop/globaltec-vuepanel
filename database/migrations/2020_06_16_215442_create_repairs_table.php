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
            $table->integer('product_id');
            $table->string('serial_number');
            $table->string('repair_no');
            $table->date('admission');
            $table->date('labsent');
            $table->date('labreturn');
            $table->date('deliver');
            $table->string('accesories')->nullable();
            $table->text('fail_description')->nullable();
            $table->text('repair_description')->nullable();
            $table->string('labcost_coin')->nullable();
            $table->string('repaircost_coin')->nullable();
            $table->string('transportcost_coin')->nullable();
            $table->string('markup_coin')->nullable();
            $table->string('spare_1')->nullable();
            $table->string('spare_2')->nullable();
            $table->string('spare_3')->nullable();
            $table->string('spare_4')->nullable();
            $table->string('spare_5')->nullable();
            $table->string('laboratory');
            $table->decimal('labcost')->nullable();
            $table->decimal('repaircost')->nullable();
            $table->decimal('transportcost')->nullable();
            $table->decimal('markup')->nullable();
            $table->decimal('repair_total')->nullable();
            $table->string('status');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('repairs');
    }
}
