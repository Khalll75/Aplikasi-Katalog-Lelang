<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LelangSchedule extends Model
{
    protected $table = 'lelang_schedules';
    protected $fillable = ['property_id', 'tanggal', 'lokasi', 'limit_lelang'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}
