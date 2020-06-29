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
            $table->string('repair_no');
            $table->date('admission');
            $table->date('labsent');
            $table->date('labreturn');
            $table->date('deliver');
            $table->string('laboratory');
            $table->decimal('labcost');
            $table->decimal('repaircost');
            $table->decimal('transportcost');
            $table->decimal('markup');
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
