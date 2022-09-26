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
        Schema::create('trip_details', function (Blueprint $table) {
            $table->id()                                            ;
            $table->integer('trip_id')->index()                     ;
            $table->date('date')->index()                           ;
            $table->integer('in_purpose')->nullable()->index()      ;
            $table->integer('ex_purpose')->nullable()->index()      ;
            $table->string('party')->nullable()->index()            ;
            $table->string('in_amount')->nullable() ->index()       ;
            $table->string('out_amount')->nullable() ->index()      ;
            $table->string('comment')->nullable()                   ;
            $table->string('entry_by')                              ;
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
        Schema::dropIfExists('trip_details');
    }
};
