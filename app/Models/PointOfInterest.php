<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointOfInterest extends Model
{
    protected $table = 'points_of_interest';

    protected $fillable = ['property_id', 'poin'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
