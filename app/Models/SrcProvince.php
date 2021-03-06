<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SrcProvince extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'boundary',
    ];

    public function crops(): HasMany
    {
        return $this->hasMany(Crop::class);
    }

}
