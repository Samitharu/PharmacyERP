<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('supplierId')->index();
            $table->string('supplierName',255);
            $table->string('address',255);
            $table->string('contactNo');
            $table->unsignedBigInteger('createdBy');

            //Deleted at
            $table->softDeletes();

            $table->timestamps();

            $table->foreign('createdBy')->references('userId')->on('users'); // Foreign key
            $table->engine = 'InnoDB';
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
};
