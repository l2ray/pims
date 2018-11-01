<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pName',100);
            $table->date('pMDate');
            $table->date('pExpDate');
            $table->integer('pType');
            $table->integer('pCat');
            $table->integer('pUnitPrice');
            $table->integer('pWareHouse');
            $table->integer('pQuantity');
            $table->integer("isTax");
            $table->integer("treshHold");
            $table->integer("warningTresh");
            $table->string("pGName");
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
        Schema::dropIfExists('products');
    }
}
