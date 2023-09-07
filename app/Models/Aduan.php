<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    // Maklumkan kepada model ini, bahawa nama table yang perlu dihubungi
    protected $table = 'aduan';

    // Mass assigment property $fillable atau $guarded
    protected $fillable = [
        'no_tiket',
        'nama_pengadu',
        'email_pengadu',
        'telefon_pengadu',
        'jenis_aduan',
        'maklumat_aduan'
    ];
}
