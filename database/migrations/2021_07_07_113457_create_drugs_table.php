<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('code_no')->nullable();
            $table->string('product_name');
            $table->string('generic_name')->nullable();
            $table->text('description')->nullable();
            $table->string('prescription')->nullable();
            $table->string('expiry_date')->nullable();

            $table->string('allergy_group')->nullable();
            $table->string('section')->nullable();
            $table->string('formulation')->nullable();
            $table->string('category')->nullable();
            $table->string('class')->nullable();

            $table->string('arrival_date')->nullable();
            $table->string('supplier')->nullable();
            $table->string('store_balance')->nullable();
            $table->string('reorder_level')->nullable();
            $table->string('revenue_fund')->nullable();
            $table->string('revenue_class')->nullable();

            $table->string('unit_pack')->nullable();
            $table->float('cost_price', 8, 2)->nullable();
            $table->string('quantity')->nullable();
            $table->float('retail_price', 8, 2)->nullable();

            $table->string('unit')->nullable();
            $table->integer('strength')->nullable();
            $table->string('dose')->nullable();
            $table->string('dose_unit')->nullable();
            $table->string('frequency')->nullable();
            $table->string('time')->nullable();
            $table->string('duration')->nullable();
            $table->string('dosage')->nullable();

            $table->string('instructions')->nullable();
            $table->string('indications')->nullable();
            $table->string('mechanisms')->nullable();
            $table->string('contra_indications')->nullable();
            $table->string('precautions')->nullable();
            $table->string('adverse_effects')->nullable();
            $table->string('drug_interactions')->nullable();
            $table->boolean('nhis')->nullable();
            $table->boolean('pregnancy')->nullable();
            $table->boolean('breastfeeding')->nullable();
            $table->boolean('children')->nullable();
            $table->boolean('elderly')->nullable();
            $table->boolean('hypertension')->nullable();
            $table->boolean('diabetes')->nullable();
            $table->boolean('asthmatic')->nullable();
            $table->boolean('age_limit')->nullable();
            $table->boolean('antenatal')->nullable();

            $table->float('private_price', 8, 2)->nullable();
            $table->float('brookstone_price', 8, 2)->nullable();
            $table->float('agip_price', 8, 2)->nullable();
            $table->float('belema_price', 8, 2)->nullable();
            $table->float('axamansard_price', 8, 2)->nullable();
            $table->float('avon_price', 8, 2)->nullable();
            $table->float('novo_price', 8, 2)->nullable();
            $table->float('hygeia_price', 8, 2)->nullable();
            $table->float('venus_price', 8, 2)->nullable();
            $table->float('hallmark_price', 8, 2)->nullable();
            $table->float('regenix_price', 8, 2)->nullable();
            $table->float('reliance_price', 8, 2)->nullable();
            $table->float('greenocean_price', 8, 2)->nullable();
            $table->float('leadway_price', 8, 2)->nullable();
            $table->float('tht_price', 8, 2)->nullable();
            $table->float('abua_price', 8, 2)->nullable();
            $table->float('nhis_price', 8, 2)->nullable();

            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('drugs');
    }
}
