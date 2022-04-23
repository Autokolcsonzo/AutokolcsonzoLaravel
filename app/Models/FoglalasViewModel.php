<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoglalasViewModel extends Model
{
    use HasFactory;

    protected $table = 'felhasznalo_foglalas';
    protected $primaryKey = 'fogazon_foglalas';
    public $incrementing = false;
    public $timestamps = false;
   

    protected $fillable = [
  
        'fogazon_foglalas',
            'alvazSzam',
                'felhasznalo',
                'elvitel',
                'visszahozatal',
                'fogl_kelt',
                'ervenyessegi_ido',
                'kedvezmeny',
                'allapot',
                'befizetett_osszeg',
                'kifizetendo_osszeg',
                'kedvezmeny',
                'megye',
                'ir_szam',
                'varos',
                'utca',
                'hazszam',
                'napiar',
                'fizetes_alapja',
                'foglalas_osszege',
                'fogl_kelt'
    ];
    
    use HasFactory;
}
