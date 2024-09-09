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
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId')->index();
            $table->string('userName',255);
            $table->string('password',255);
            $table->string('email',255);
            $table->unsignedBigInteger('roleId');
            
            //Deleted at
            $table->softDeletes();
            $table->timestamps();

            //Foreign key
            $table->foreign('roleId')->references('roleId')->on('roles');


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
        Schema::dropIfExists('users');
    }
};
