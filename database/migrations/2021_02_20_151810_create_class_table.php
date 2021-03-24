<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 31);
            $table->integer('price');
        });

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('class')->insert(
            array(
                'title' => 'Класс A',
                'price' => 25,
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('class')->insert(
            array(
                'title' => 'B',
                'price' => 50,
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('class')->insert(
            array(
                'title' => 'C',
                'price' => 100,
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('class')->insert(
            array(
                'title' => 'D',
                'price' => 150,
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('class')->insert(
            array(
                'title' => 'E',
                'price' => 200,
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('class')->insert(
            array(
                'title' => 'F',
                'price' => 250,
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
        Schema::dropIfExists('class');
    }
}
