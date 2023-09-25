<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'neighborhood', 'city', 'uf', 'number', 'zip_code'];

    public function adressable(): MorphTo{
        return $this->morphTo();
    } 
}