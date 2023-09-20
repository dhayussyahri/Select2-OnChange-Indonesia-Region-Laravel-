<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regencie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function districts()
    {
    return $this->hasMany(District::class);
    }
}
