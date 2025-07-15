<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarUser extends Model
{
    protected $table = 'daftar_users';
    protected $fillable = ['name', 'phone'];
}
