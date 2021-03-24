<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 63);
        });

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $arMarks = [
            'DB11', 'A3', 'Bentayga', 'G32',
            'V3', 'CT6', 'CS35', 'Tiggo 2',
            'Camaro', 'Pacifica', 'Berlingo', 'mi-Do',
        ];
        foreach ($arMarks as $sMark) {
            DB::table('model')->insert(
                array(
                    'title' => $sMark,
                    'created_at' => $current_date_time,
                    'updated_at' => $current_date_time,
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model');
    }
}
