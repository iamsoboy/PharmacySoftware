<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_reference',
        'code_no',
        'name',
        'cost_price',
        'quantity',
        'sale_price',
        'expiry_date',
        'submitted_by',
        'updated_by',
        'deleted_by'
        ];
}
