<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FelhasznaloModell extends Model
{
    protected $table = 'felhasznalo';
    protected $primaryKey = 'felhasznalo_id';
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'felhasznalo_id',
        'vezeteknev',
        'keresztnev',
        'felhasznalonev',
        'jelszo',
        'szul_ido',
        'varos',
        'profilkep',
        'megye',
        'ir_szam',
        'utca',
        'hazszam',
        'tel_szam',
        'e_mail',
        'reg_datum',
        'jogkor',
        'telephely',
        'created_at',
        'updated_at'
    ];
    
    use HasFactory;
}
