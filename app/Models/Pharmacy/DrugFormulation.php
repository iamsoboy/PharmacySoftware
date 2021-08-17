<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugFormulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The Drug Formulation Relationship with various Models
     */
}
