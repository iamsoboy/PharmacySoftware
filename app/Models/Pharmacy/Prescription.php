<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dispense_id',
        'code_no',
        'drug_name',
        'cost_price',
        'sale_price',
        'dosage_regimen',
        'quantity_prescribed',
        'subtotal_prescribed',
    ];

    public function dispense()
    {
       return $this->belongsTo('App\Models\Pharmacy\Dispense');
    }
}
