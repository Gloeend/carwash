<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 127)->unique();
            $table->unsignedBigInteger('id_type_service');
            $table->foreign('id_type_service')->references('id')->on('type_service')->onDelete('cascade');
            $table->integer('price');
        });

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('service')->insert(
            array(
                'title' => 'Химчистка салона',
                'id_type_service' => 2,
                'price' => '200',
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('service')->insert(
            array(
                'title' => 'Мойка кузова и ковриков',
                'id_type_service' => 1,
                'price' => '200',
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service');
    }
}
