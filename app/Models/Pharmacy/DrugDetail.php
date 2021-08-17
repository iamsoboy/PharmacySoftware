<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The Drug Details Relationship with various Models
     */
}
