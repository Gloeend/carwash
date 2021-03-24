<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMmcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mmc', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_model');
            $table->unsignedBigInteger('id_mark');
            $table->unsignedBigInteger('id_class');
            $table->foreign('id_model')->references('id')->on('model')->onDelete('cascade');
            $table->foreign('id_mark')->references('id')->on('mark')->onDelete('cascade');
            $table->foreign('id_class')->references('id')->on('class')->onDelete('cascade');
        });

        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        for ($i = 1; $i < DB::table('model')->count() + 1; ++$i) {
            DB::table('mmc')->insert(
                array(
                    'id_model' => $i,
                    'id_mark' => $i,
                    'id_class' => mt_rand(1, 6),
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
        Schema::dropIfExists('mmc');
    }
}
