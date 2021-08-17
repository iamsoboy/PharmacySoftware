<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispenses', function (Blueprint $table) {
            $table->id();
            $table->string('prescription_no');
            $table->string('hospital_no')->nullable();
            $table->string('revenue_no')->nullable();
            $table->string('prescription_date');
            $table->string('pharmacy')->nullable();
            $table->string('dispensary')->nullable();
            $table->string('surname')->nullable();
            $table->string('other_names')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();

            $table->string('retainership');
            $table->string('ward_clinic')->nullable();
            $table->string('consultant')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('allergy')->nullable();

            $table->string('code_no')->nullable();
            $table->string('item_drug')->nullable();
            $table->float('cost_price', 8, 2)->nullable();
            $table->string('dosage_regimen')->nullable();
            $table->integer('quantity_dispensed')->nullable();
            $table->string('subtotal_dispensed')->nullable();
            $table->boolean('dispensed')->default(1);

            $table->string('dosage_regimen2')->nullable();
            $table->string('quantity_prescribed')->nullable();
            $table->float('subtotal_prescribed', 8, 2)->nullable();
            $table->string('prescribed_by')->nullable();
            $table->string('instructions')->nullable();
            $table->string('expiry_date')->nullable();

            $table->boolean('in_patient')->nullable();
            $table->boolean('approved')->nullable();
            $table->string('approval_date')->nullable();
            $table->string('pharm_ref_no')->nullable();
            $table->string('rev_ref_no')->nullable();
            $table->string('batch_no')->nullable();

            $table->string('dispensed_by')->nullable();
            $table->boolean('returned')->default(0);
            $table->string('returned_by')->nullable();
            $table->boolean('cancel')->default(0);
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
        Schema::dropIfExists('dispenses');
    }
}
