<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SrcCommodity extends Model
{
    use HasFactory;

    protected $fillable = [
        'commodity',
        'crop_type',
        'seed_ratio',
    ];

    public function crops()
    {
        return $this->hasMany(Crop::class);
    }
}
