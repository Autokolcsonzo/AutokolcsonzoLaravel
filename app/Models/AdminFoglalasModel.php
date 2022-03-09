<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminFoglalasModel extends Model
{
    use HasFactory;

    protected $table = 'foglalas';
    protected $primaryKey = 'fogl_azonosito';
   

    protected $fillable = [
  
        'fogl_azonosito',
        'alvazSzam',
            'felhasznalo',
            'elvitel',
            'visszahozatal',
            'fogl_kelt',
            'ervenyessegi_ido',
            'kedvezmeny',
            'allapot'
    ];

    public function felhasznalo(){
        return $this->hasOne(FelhasznaloModell::class, 'felhasznalo_id', 'felhasznalo');
    }

  

}