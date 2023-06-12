<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    use HasFactory;
    protected $fillable = ['no_kartu', 'provider', 'nominal', 'tanggal', 'id_users'];
}
