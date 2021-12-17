<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('part_id');
            $table->unsignedInteger('storage_id');
            $table->unsignedInteger('supplier_id');
            $table->integer('quantity');
            $table->longText('description')->nullable();
            $table->foreign('part_id')
                ->references('id')
                ->on('parts')
                ->onDelete('cascade');
            $table->foreign('storage_id')
                ->references('id')
                ->on('storages')
                ->onDelete('cascade');
             $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_inputs');
    }
}
