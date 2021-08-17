<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The Drug Class Relationship with various Models
     */
    public function drugs()
    {
        return $this->hasMany('App\Models\Pharmacy\Drug');
    }
}
