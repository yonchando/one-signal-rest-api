<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushPlayerIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = config('onesignal.table_name');
        Schema::create($tableName, function (Blueprint $table) {
            $model_id = config('onesignal.model_id');
            $table->id();
            $table->string('player_id');
            $table->bigInteger($model_id);
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
        Schema::dropIfExists('push_player_ids');
    }
}
