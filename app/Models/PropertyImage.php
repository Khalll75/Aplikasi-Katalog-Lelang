<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $table = 'property_images';
    protected $fillable = ['property_id', 'image_url', 'is_main'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
