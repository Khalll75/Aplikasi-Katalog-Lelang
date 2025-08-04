<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LelangSchedule extends Model
{
    protected $table = 'lelang_schedules';
    protected $fillable = ['property_id', 'tanggal', 'lokasi', 'limit_lelang'];

    // Disable timestamps since the table doesn't have created_at/updated_at columns
    public $timestamps = false;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}
