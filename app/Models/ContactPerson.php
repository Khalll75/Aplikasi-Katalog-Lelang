<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $table = 'contact_persons';

    protected $fillable = ['property_id', 'nama', 'no_hp'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
