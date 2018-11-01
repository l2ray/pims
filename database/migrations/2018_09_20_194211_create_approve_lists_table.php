<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApproveListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approve_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pRequestingId');
            $table->integer('sRequestingId');
            $table->integer('pGivingId');
            $table->integer('sGivingId');
            $table->integer('qRequesting');
            $table->integer('status');
            $table->integer('requestingStaffId');
            $table->integer('approvingStafId');
            $table->text('requestReason');
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
        Schema::dropIfExists('approve_lists');
    }
}
