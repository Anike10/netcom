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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('b_name');
            $table->string('acc_name')->unique();
            $table->string('acc_no');
            $table->string('comments')->nullable(true);
            $table->string('entry_by');
            $table->timestamps();
// $table->unique(['mytext', 'user_id']);
            $table->unique(['b_name', 'acc_no']);
        });




    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_details');
    }
};
