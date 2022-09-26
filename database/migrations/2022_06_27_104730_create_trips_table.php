<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('trips', function (Blueprint $table) {
             $table->id();
             $table->timestamp('from_date')->nullable();
             $table->timestamp('to_date')->nullable();
             $table->string('driver_id');
             $table->string('helper_id');
             $table->string('vehicle_id');
             $table->string('comment')->nullable();
             $table->integer('status')->default(0);
             $table->integer('commition_per')->nullable();
             $table->integer('com_amount')->nullable();
             $table->integer('com_driver')->nullable();
             $table->integer('com_helper')->nullable();
             $table->integer('allowance')->nullable();
             $table->integer('allow_driver')->nullable();
             $table->integer('allow_helper')->nullable();
             $table->integer('balance')->nullable();
             $table->integer('advance')->nullable();
             $table->integer('receivable')->nullable();
             $table->integer('t_income')->nullable();
             $table->integer('t_expend')->nullable();
             $table->string('entry_by');
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
        Schema::dropIfExists('trips');
    }
};
