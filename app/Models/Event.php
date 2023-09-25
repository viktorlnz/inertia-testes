<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'starts_at', 'duration_time'];

    public function image():MorphOne{
        return $this->morphOne(Image::class, 'imageable');
    }

    public function address():MorphOne{
        return $this->morphOne(Address::class, 'addressable');
    }
}
