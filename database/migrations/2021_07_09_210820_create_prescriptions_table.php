<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dispense_id')->unsigned()->nullable();
            $table->foreign('dispense_id')->references('id')->on('dispenses')
                ->onUpadate('cascade')->onDelete('set null');
            $table->string('code_no');
            $table->string('drug_name');
            $table->float('cost_price', 8, 2);
            $table->float('sale_price', 8, 2);
            $table->string('dosage_regimen');
            $table->string('quantity_prescribed')->nullable();
            $table->float('subtotal_prescribed', 8, 2)->nullable();
            $table->boolean('status')->default(1);
            $table->string('updated_by')->nullable();
            $table->string('canceled_by')->nullable();
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
        Schema::dropIfExists('prescriptions');
    }
}
