<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->timestamp('coming_at')->nullable();
            $table->json('service');
            $table->enum('status', array('В ожидании', 'Подтвержден', 'Отклонен', 'Выполнен'))->default('В ожидании');
            $table->unsignedBigInteger('id_mmc');
            $table->unsignedBigInteger('id_client');

            $table->foreign('id_mmc')->references('id')->on('mmc')->onDelete('cascade');
            $table->foreign('id_client')->references('id')->on('client')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
