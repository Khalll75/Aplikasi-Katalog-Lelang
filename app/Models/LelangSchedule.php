<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LelangSchedule extends Model
{
    protected $fillable = ['property_id', 'tanggal', 'lokasi', 'harga_limit'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    
}
