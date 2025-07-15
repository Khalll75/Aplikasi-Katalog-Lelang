<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'kode_aset', 'nama', 'alamat', 'luas_tanah', 'luas_bangunan',
        'kamar_tidur', 'kamar_mandi', 'listrik', 'air', 'kondisi', 'kategori_lot'
    ];

    public function media()
    {
        return $this->hasMany(PropertyMedia::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyMedia::class)->where('media_type', 'image');
    }

    public function videos()
    {
        return $this->hasMany(PropertyMedia::class)->where('media_type', 'video');
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
