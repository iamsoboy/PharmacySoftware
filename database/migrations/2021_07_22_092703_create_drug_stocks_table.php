<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('stock_reference');
            $table->string('code_no');
            $table->string('name');
            $table->float('cost_price', 8, 2);
            $table->integer('quantity');
            $table->float('sale_price', 8, 2);
            $table->string('expiry_date');
            $table->string('submitted_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('drug_stocks');
    }
}
