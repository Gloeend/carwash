<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTypeServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_service', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 127)->unique();
        });


        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('type_service')->insert(
            array(
                'title' => 'Мойка кузова',
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            )
        );
        DB::table('type_service')->insert(
            array(
                'title' => 'Химчистка',
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
        Schema::dropIfExists('type_service');
    }
}
