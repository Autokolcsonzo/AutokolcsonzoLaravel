<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FelhasznaloModell extends Model
{
    protected $table = 'felhasznalo';
    protected $primaryKey = 'felhasznalo_id';
    protected $fillable = [
       
        'vezeteknev',
        'keresztnev',
        'felhasznalonev',
        'jelszo',
        'szul_ido',
        'varos',
        'megye',
        'ir_szam',
        'utca',
        'hazszam',
        'tel_szam',
        'e_mail',
    ];
    
    use HasFactory;
}
