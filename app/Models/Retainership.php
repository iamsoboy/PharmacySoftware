<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retainership extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name_price',
        'description',
        'status',
        'created_by'
    ];

    protected $attributes = [
        'status' => 1,
    ];

    public function getStatusAttribute($attribute)
    {
        return $this->statusOptions()[$attribute];
    }

    public function statusOptions()
    {
        return [
            1 => "Active",
            0 => "Inactive",
        ];
    }
    /**
     * The Drug Relationship with various Models
     */

}
