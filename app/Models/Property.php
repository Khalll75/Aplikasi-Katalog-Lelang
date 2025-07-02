<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'kode_aset', 'nama', 'alamat', 'luas_tanah', 'luas_bangunan',
        'kamar_tidur', 'kamar_mandi', 'listrik', 'air', 'kondisi'
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function lelangSchedule()
    {
        return $this->hasOne(LelangSchedule::class);
    }

    public function pointsOfInterest()
    {
        return $this->hasMany(PointOfInterest::class);
    }

    public function contactPersons()
    {
        return $this->hasMany(ContactPerson::class);
    }
}
