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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('No_Invoice'); 
            $table->unsignedBigInteger('voucher_id');
            $table->unsignedBigInteger('cabangs_id');
            $table->unsignedBigInteger('toko_id');
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('cabangs_id')->references('id')->on('cabangs');
            $table->foreign('toko_id')->references('id')->on('tokos');
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
        Schema::dropIfExists('customers');
    }
};
