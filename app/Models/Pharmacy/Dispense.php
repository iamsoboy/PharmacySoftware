<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispense extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'prescription_no',
        'hospital_no',
        'prescription_date',
        'surname',
        'other_names',
        'age',
        'phone',
        'gender',
        'retainership',
        'ward_clinic',
        'consultant',
        'dispensed_by',
    ];

    public function prescriptions()
    {
        return $this->hasMany('App\Models\Pharmacy\Prescription');
    }
}
