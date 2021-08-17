<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugAllergyGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The Drug Allergy Group Relationship with various Models
     */

}
