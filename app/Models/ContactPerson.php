<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $table = 'contact_persons';
    protected $fillable = ['property_id', 'nama', 'no_hp'];

    // Disable timestamps since the table doesn't have created_at/updated_at columns
    public $timestamps = false;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
