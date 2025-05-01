<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins'; // Nama tabel di DB (opsional jika sama)
    protected $fillable = ['email', 'password']; // Field yang bisa diisi
    protected $hidden = ['password']; // Supaya password tidak terlihat saat toArray()
}
