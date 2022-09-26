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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date')->index() ;
            $table->string('type')->index()             ;
            $table->string('amount')->index()          ;
            $table->string('from_trip_id')->nullable()->index()   ;
            $table->string('to_trip_id')->nullable()->index()   ;
            $table->string('commition_trip_id')->nullable()->index()   ;
            $table->string('from_staff_id')->nullable()->index()   ;
            $table->string('to_staff_id')->nullable()->index()   ;
            $table->string('from_party_id')->nullable()->index()   ;
            $table->string('to_party_id')->nullable()->index()   ;
            $table->string('from_acc')->nullable()->index()   ;
            $table->string('to_acc')->nullable()->index()   ;

            $table->string('comment')->nullable()       ;
            $table->string('entry_by')                  ;
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
        Schema::dropIfExists('transactions');
    }
};
