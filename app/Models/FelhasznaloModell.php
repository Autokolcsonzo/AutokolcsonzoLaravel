<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FelhasznaloModell extends Model
{
    protected $table = 'felhasznalo';
    protected $primaryKey = 'felhasznalo_id';
    protected $fillable = [

        'felhasznalo_id',
       'profilkep',
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
        'telephely'
    ];

    public function telephely(){
        return $this->hasOne(Telephely::class, 'telephely_id', 'telephely');
    }
    
    use HasFactory;
}
