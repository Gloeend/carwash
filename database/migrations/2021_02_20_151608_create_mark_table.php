<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('title', 63);
        });

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $arMarks = [
            'Aston Martin', 'Audi', 'Bentley', 'BMW',
            'Brilliance', 'Cadillac', 'Changan', 'Chery',
            'Chevrolet', 'Chrysler', 'Citroen', 'Datsun',
        ];
        foreach ($arMarks as $sMark) {
            DB::table('mark')->insert(
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
        Schema::dropIfExists('mark');
    }
}
