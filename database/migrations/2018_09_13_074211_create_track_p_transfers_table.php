<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackPTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_p_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pId');
            $table->integer('fromStore');
            $table->integer('toStore');
            $table->integer('transferedBy');
            $table->integer('qTrnsfered');
            $table->integer('approvedBy');
            $table->integer('approvalStatus');
            $table->integer('pidSubFrom');
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
        Schema::dropIfExists('track_p_transfers');
    }
}
