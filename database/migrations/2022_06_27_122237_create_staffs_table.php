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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('name');
            $table->string('f_name');
            $table->string('nid')->nullable();
            $table->string('driving_no')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile');
            $table->string('role');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('staffs');
    }
};
